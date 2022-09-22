---
title: Single-database tenancy
extends: _layouts.documentation
section: content
---

# Single-database tenancy {#single-database-tenancy}

Single-database tenancy comes with lower devops complexity, but larger code complexity than multi-database tenancy, since you have to scope things manually, and won't be able to integrate some third-party packages.

It is preferable when you have too many shared resources between tenants, and don't want to make too many cross-database queries.

To use single-database tenancy, make sure you disable the `DatabaseTenancyBootstrapper` which is responsible for switching database **connections** for tenants.

You can still use the other [tenancy bootstrappers]({{ $page->link('tenancy-bootstrappers') }}) to separate tenant caches, filesystems, etc.

Also make sure you have disabled the database creation jobs (`CreateDatabase`, `MigrateDatabase`, `SeedDatabase` ...) from listening to the `TenantCreated` event.

# Concepts {#concepts}

In single-database tenancy, there are 4 types of models:

- your **Tenant** model
- primary models — models that **directly** belongTo tenants
- secondary models — models that **indirectly** belongTo tenants
    - e.g. **Comment** belongsTo **Post** belongsTo **Tenant**
    - or more complex, **Vote** belongsTo **Comment** belongsTo **Post** belongsTo **Tenant**
- global models — models that are **not scoped** to any tenant whatsoever

To scope your queries correctly, apply the `Stancl\Tenancy\Database\Concerns\BelongsToTenant` trait **on primary models**. This will ensure that all calls to your parent models are scoped to the current tenant, and that **calls to their child relations are scoped through the parent relationships**.

And that's it. Your models are now automatically scoped to the current tenant, and not scoped at all when there's no current tenant (e.g. in a central admin panel).

However, there's one edge case to keep in mind. Consider the following set-up:

```php
class Post extends Model
{
    use BelongsToTenant;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
```

Looks correct, but you might still accidentally access another tenant's comments.

If you use this:

```php
Comment::all();
```

then the model has no way of knowing how to scope that query, since it doesn't directly belong to the tenant. Also note that in practice, you really shouldn't be doing this much. You should ideally access secondary models through parent models in every single case.

However, sometimes you might have a use case where you **really need to do that** in the tenant context. For that reason, we also provide you with a `BelongsToPrimaryModel` trait, which lets you scope calls like the one above to the current tenant, by loading the parent relationship — which gets automatically scoped to the current tenant — on them.

So, to give you an example, you would do this:

```php
class Comment extends Model
{
		use BelongsToPrimaryModel;

    public function getRelationshipToPrimaryModel(): string
    {
        return 'post';
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
```

And this will automatically scope the `Comment::all()` call to the current tenant. Note that the limitation of this is that you **need to be able to define a relationship to a primary model**, so if you need to do this on the "Vote" in ***Vote** belongsTo **Comment** belongsTo **Post** belongsTo **Tenant**,* you need to define some strange relationship. Laravel supports `HasOneThrough`, but not `BelongsToThrough`, so you'd need to do some hacks around that. For that reason, I recommend avoiding these `Comment::all()`-type queries altogether.

# Database considerations {#database-considerations}

### Unique indexes {unique-indexes}

If you'd have a unique index such as:

```php
$table->unique('slug');
```

in a standard non-tenant, or multi-database-tenant, application, you need to scope this unique index to the tenant, meaning you'd do **this on primary models:**

```php
$table->unique(['tenant_id', 'slug']);
```

and this on **secondary models:**

```php
// Imagine we're in a 'comments' table migration

$table->unique(['post_id', 'user_id']);
```

### Validation {#validations}

The `unique` and `exists` validation rules of course aren't scoped to the current tenant, so you need to scope them manually like this:

```php
Rule::unique('posts', 'slug')->where('tenant_id', tenant('id'));
```

If that feels like a chore, you may use the `Stancl\Tenancy\Database\Concerns\HasScopedValidationRules` trait on your custom [Tenant]({{ $page->link('tenants') }}) model to add methods for these two rules.

You'll be able to use these two methods:

```php
// You may retrieve the current tenant using the tenant() helper.
// $tenant = tenant();

$rules = [
    'id' => $tenant->exists('posts'),
    'slug' => $tenant->unique('posts'),
]
```

### Low-level database queries {#low-level-database-queries}

And the final thing to keep in mind is that `DB` facade calls, or any other types of direct database queries, of course won't be scoped to the current tenant.

The package can only provide scoping logic for the abstraction logic that Eloquent is, it can't do anything with low level database queries.

Be careful with using them.

## Making global queries {#making-global-queries}

To disable the tenant scope, simply add `withoutTenancy()` to your query.

## Customizing the column name {#customizing-the-column-name}

If you'd like to customize the column name to use e.g. `team_id` instead of `tenant_id` — if that makes more sense given your business terminology — you can do that by setting this static property in a service provider or some such class:

```php
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

BelongsToTenant::$tenantIdColumn = 'team_id';
```

Note that this is universal to all your primary models, so if you use `team_id` somewhere, you use it everywhere — you can't use both `team_id` and `tenant_id`.
