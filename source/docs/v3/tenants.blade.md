---
title: Tenants
extends: _layouts.documentation
section: content
---

# Tenants {#tenants}

A tenant can be any model that implements the `Stancl\Tenancy\Contracts\Tenant` interface.

The package comes with a base `Tenant` model that's ready for common things, though will require extending in most cases as it attempts not to be too opinionated.

The base model has the following features on top of the ones that are necessary by the interface:

- Forced central connection (lets you interact with Tenant models even in tenant contexts)
- Data column trait — lets you store arbitrary keys. Attributes that don't exist as columns on your `tenants` table go to the `data` column as serialized JSON.
- Id generation trait — when you don't supply an ID, a random uuid will be generated. An alternative to this would be using AUTOINCREMENT columns. If you wish to use numerical ids, change the `create_tenants_table` migration to use `bigIncrements()` or some such column type, and set `tenancy.id_generator` config to null. That will disable the ID generation altogether, falling back to the database's autoincrement mechanism.

## Tenant Model
**Most** applications using this package will want domain/subdomain identification and tenant databases. To do this, create a new model, e.g. `App\Tenant`, that looks like this:

```php
<?php

namespace App;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
}
```

Then, configure the package to use this model in `config/tenancy.php`:

```php
'tenant_model' => \App\Tenant::class,
```

If you want to customize the `Domain` model, you can do that too.

**If you don't need domains or databases, ignore the steps above.** Everything will work just as well.

## Creating tenants {#creating-tenants}

You can create tenants like any other models:

```php
$tenant = Tenant::create([
    'plan' => 'free',
]);
```

After the tenant is created, an event will be fired. This will result in things like the database being created and migrated, depending on what jobs listen to the event.

## Custom columns {#custom-columns}

Attributes of the tenant model which don't have their own column will be stored in the `data` JSON column. You can set these attributes like you'd set normal model attributes:

```php
$tenant->update([
    'attributeThatHasNoColumn' => 'value', // stored in the `data` JSON column
    'plan' => 'free' // stored in the dedicated `plan` column (see below)
]);
```
or
```php
$tenant->customAttribute = 'value'; // stored in the `data` JSON column
$tenant->plan = 'free'; // stored in the `plan` column (see below)
$tenant->save();
```

You may define the custom columns (that **won't** be stored in the `data` JSON column) by overriding the `getCustomColumns()` method on your `Tenant` model:

```php
public static function getCustomColumns(): array
{
    return [
        'id',
        'plan',
    ];
}
```

**Don't forget to keep `id` in the custom columns!**

If you want to rename the `data` column, rename it in a migration and implement this method on your model:

```php
public static function getDataColumn(): string
{
    return 'my-data-column';
}
```

Note that querying data inside the `data` column with `where()` will require that you do for example:
```php
where('data->foo', 'bar')
```

The data column is encoded/decoded only on model retrieval and saving.

Also a good rule of thumb is that when you need to query the data with `WHERE` clauses, it should have a dedicated column. This will improve performance and you won't have to think about the `data->` prefixing.

## Running commands in the tenant context {#running-commands-in-the-tenant-context}

You may run commands in a tenant's context and then return to the previous context (be it central, or another tenant's) by passing a callable to the `run()` method on the tenant object. For example:

```php
$tenant->run(function () {
    User::create(...);
});
```

## Internal keys {#internal-keys}

Keys that start with the internal prefix (`tenancy_` by default, but you can customize this by overriding the `internalPrefix()` method) are for internal use, so don't start any attribute/column names with that.

## Events {#events}

The `Tenant` model dispatches Eloquent events, all of which have their own respective class. You can read more about this on the [Event system]({{ $page->link('event-system') }}) page.

## Accessing the current tenant {#accessing-the-current-tenant}

You may access the current tenant using the `tenant()` helper. You can also pass an argument to get an attribute from that tenant model, e.g. `tenant('id')`.

Alternatively, you may typehint the `Stancl\Tenancy\Contracts\Tenant` interface to inject the model using the service container.

## Accessing the central application {#accessing-the-central-application}

When your code executes in the context of a tenant, you may access the central application context by using the `tenancy()->central($callback)` function.

For instance, if you want to retrieve the list of users of the central application when the code executes in a tenant's context, you may write:

```php
// Here we are in the tenant's context. User::all() would return the current tenant's users
$centralUsers = tenancy()->central(function () {
    // Here we are in the central context
    return User::all();
});
```

## Incrementing IDs {#incrementing-ids}

By default, the migration uses `string` for the `id` column, and the model generates UUIDs when you don't supply an `id` during tenant creation.

If you'd like to use incrementing ids instead, you can override the `getIncrementing()` method:

```php
public function getIncrementing()
{
    return true;
}
```
