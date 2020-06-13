---
title: Synced resources between tenants
extends: _layouts.documentation
section: content
---

# Synced resources between tenants

If you'd like to share certain resources, usually users, between tenant databases, you can use our resource syncing feature. This will let you **sync specific columns between specific tenant databases and the central database.**

This is a relatively complex feature, so before implementing it, make sure you really need it. You only need this feature if you're using multi-database tenancy and need to sync specific resources (like users) between different tenants' databases.

## Database

The resource exists in the central database, for example a `users` table. Another table exists in the tenants' databases. It can use the same name as the central database or a different name — up to you.

Then there's a pivot table in the central database that maps the resource (`users` in our case) to tenants.

The resource isn't synced with all tenant databases — that would be unwanted, e.g. a user typically only exists in select few tenants.

## Concepts

You will need two models for the resource. One for the tenant database and one for the central database. The tenant model must implement the `Syncable` interface and the central model must implement the `SyncMaster` interface.

`SyncMaster` is an extension of `Syncable`, it requires one extra method — the relationship to tenants, to know which tenants also have this resource.

Both models must use the `ResourceSyncing` trait. This trait makes sure that a `SyncedResourceSaved` event is fired whenever the model is saved. The `UpdateSyncedResource` listener will update the resource in the central database and in all tenant databases where the resource exists. The listener is registered in your `TenancyServiceProvider`.

An important requirement of the `Syncable` interface is the `getSyncedAttributeNames()` method. You don't want to sync all columns (or more specifically, attributes, since we're talking about Eloquent models — **accessors & mutators are supported**). In the `users` example, you'd likely only want to sync attributes like the name, email and password, while keeping tenant-specific (or workspace-specific/team-specific, whatever makes sense in your project's terminology) attributes independent.

The resource needs to have the same global ID in the central database and in tenant databases.

## How it works

Let's write an example implementation:

```php
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Database\Models\TenantPivot;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    public function users()
    {
        return $this->belongsToMany(CentralUser::class, 'tenant_users', 'tenant_id', 'global_user_id', 'id', 'global_id')
            ->using(TenantPivot::class);
    }
}

class CentralUser extends Model implements SyncMaster
{
    // Note that we force the central connection on this model
    use ResourceSyncing, CentralConnection;

    protected $guarded = [];
    public $timestamps = false;
    public $table = 'users';

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'tenant_users', 'global_user_id', 'tenant_id', 'global_id')
            ->using(TenantPivot::class);
    }

    public function getTenantModelName(): string
    {
        return User::class;
    }

    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    public function getCentralModelName(): string
    {
        return static::class;
    }

    public function getSyncedAttributeNames(): array
    {
        return [
            'name',
            'password',
            'email',
        ];
    }
}

class User extends Model implements Syncable
{
    use ResourceSyncing;

    protected $guarded = [];
    public $timestamps = false;

    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    public function getCentralModelName(): string
    {
        return CentralUser::class;
    }

    public function getSyncedAttributeNames(): array
    {
        return [
            'name',
            'password',
            'email',
        ];
    }
}

// Pivot table migration
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantUsersTable extends Migration
{
    public function up()
    {
        Schema::create('tenant_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenant_id');
            $table->string('global_user_id');

            $table->unique(['tenant_id', 'global_user_id']);

            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('global_user_id')->references('global_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenant_users');
    }
}
```

Here's how it will work:

- You create a user in the central database. It only exists in the central DB.

    ```php
    $user = CentralUser::create([
        'global_id' => 'acme',
        'name' => 'John Doe',
        'email' => 'john@localhost',
        'password' => 'secret',
        'role' => 'superadmin', // unsynced
    ]);
    ```

- Now you create a user **with the same global id** in a tenant's database:

    ```php
    tenancy()->initialize($tenant);

    // Create the same user in tenant DB
    $user = User::create([
        'global_id' => 'acme',
        'name' => 'John Doe',
        'email' => 'john@localhost',
        'password' => 'secret',
        'role' => 'commenter', // unsynced
    ]);
    ```

- You update some attribute on the tenant:

    ```php
    $user->update([
        'name' => 'John Foo', // synced
        'email' => 'john@foreignhost', // synced
        'role' => 'admin', // unsynced
    ]);
    ```

- The central user's `name` and `email` have changed.

If you create more tenants and create the user in those tenants' databases, the changes will be synced between all these tenants' databases and the central database.

Creating the user inside a tenant's database will copy the resource 1:1 to the central database, including the unsynced columns (here they act as default values).

## Attaching resources to tenants

You can see that in the example above we're using the `TenantPivot` model for the BelongsToMany relationship. This lets us cascade synced resources from the central database to tenants:

```php
$user = CentralUser::create(...);

$user->attach($tenant);
```

Attaching a tenant to a user will copy even the unsynced columns (they act as default values), similarly to how creating the user inside the tenant's database will copy the tenant to the central database 1:1.

If you'd like to use a custom pivot model, look into the source code of `TenantPivot` to see what to copy (or extend it) if you want to preserve this behavior.

## Queueing

In production, you're almost certainly want to queue the listener that copies the changes to other databases. To do this, change the listener's static property:

```php
\Stancl\Tenancy\Listeners\UpdateSyncedResource::$shouldQueue = true;
```