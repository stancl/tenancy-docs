---
title: Tenancy bootstrappers
extends: _layouts.documentation
section: content
---

# Tenancy bootstrappers {#tenancy-bootstrappers}

Tenancy bootstrappers are classes which make your application tenant-aware in such a way that you don't have to change a line of your code, yet things will be scoped to the current tenant.

The package comes with these bootstrappers out of the box:

## Database tenancy bootstrapper {#database-tenancy-bootstrapper}

The database tenancy bootstrapper switches the **default** database connection to `tenant` after it constructs the connection for that tenant.

[Customizing databases]({{ $page->link('customizing-databases') }})

Note that only the **default** connection is switched. If you use another connection explicitly, be it using `DB::connection('...')`, a model `getConnectionName()` method, or a model trait like `CentralConnection`, **it will be respected.** The bootstrapper doesn't **force** any connections, it merely switches the default one.

## Cache tenancy bootstrapper {#cache-tenancy-bootstrapper}

The cache tenancy bootstrapper replaces the Laravel's CacheManager instance with a custom CacheManager that adds tags with the current tenant's ids to each cache call. This scopes cache calls and lets you selectively clear tenants' caches:

```php
php artisan cache:clear --tag=tenant_123
```

Note that you must use a cache store that supports tagging, e.g. Redis.

## Filesystem tenancy bootstrapper {#filesystem-tenancy-boostrapper}

The filesystem bootstrapper makes your app's filesystem helper methods (`storage_path()` and `asset()`) and the `Storage` facade tenant-aware by modifying the paths retrieved by them.

### The storage helper & facade
The bootstrapper suffixes the path retrieved by `storage_path()` to make the helper tenant-aware. It also makes the Storage facade tenant-aware by modifying the root locations of disks.

The suffix is `config('tenancy.filesystem.suffix_base') . $tenantKey`. The suffix base is 'tenant' by default, but feel free to change the suffix base in the tenancy config.

#### Storage facade
The root of each disk listed in `config('tenancy.filesystem.disks')` will be suffixed, but since Laravel does its own suffixing, simply suffixing the disk roots could cause unwanted behavior. Because of that, the filesystem config has the `root_override` section. The disk roots can contain `%storage_path%`, which gets replaced by `storage_path()` after tenancy has been initialized.

### Assets
The `asset()` helper retrieves links to the currently initialized and identified tenant's files using the TenantAssetsController. Make sure to [assign the identification middleware you're using in your app to TenantAssetsController's `$tenancyMiddleware`]({{ $page->link('configuration#static-properties') }}).

- You can disable tenancy of this helper in the config (`tenancy.filesystem.asset_helper_tenancy`) and explicitly use `tenant_asset()` instead. You may want to do that if you're facing issues using a package that utilizes `asset()` inside the tenant app.
- For non-tenant-specific assets (assets shared among all tenants or JS/CSS assets), you can use `global_asset()` and `mix()`.

```php
// TenancyServiceProvider (don't forget to import the classes)

public function boot()
{
    // Update the middleware used by the asset controller
    TenantAssetsController::$tenancyMiddleware = InitializeTenancyByDomainOrSubdomain::class;
}
```

This bootstrapper is the most complex one, by far. We're working on a better written explanation, but for now, refer to the 2.x docs for more information about filesystem tenancy. [https://tenancyforlaravel.com/docs/v2/filesystem-tenancy/](https://tenancyforlaravel.com/docs/v2/filesystem-tenancy/)

If you don't want to bootstrap filesystem tenancy in this way, and want to — for example — provision an S3 bucket for each tenant, you can absolutely do that. Look at the package's bootstrappers to get an idea of how to write one yourself, and feel free to implement it any way you want.

## Queue tenancy bootstrapper {#queue-tenancy-bootstrapper}

This bootstrapper adds the current tenant's ID to the queued job payloads, and initializes tenancy based on this ID when jobs are being processed.

You can read more about this on the *Queues* page:

[Queues]({{ $page->link('queues') }})

## Redis tenancy bootstrapper {#redis-tenancy-bootstrapper}

If you're using `Redis` calls (not cache calls, **direct** Redis calls) inside the tenant app, you will want to scope Redis data too. To do this, use this bootstrapper. It changes the Redis prefix for each tenant.

Note that you need phpredis, predis won't work.

## Writing custom bootstrappers {#writing-custom-bootstrappers}

If you want to bootstrap tenancy for something not covered by this package — or something covered by this package, but you want different behavior — you can do that by creating a bootstrapper class.

The class must implement the `Stancl\Tenancy\Contracts\TenancyBootstrapper` interface:

```php
namespace App;

use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;

class MyBootstrapper implements TenancyBootstrapper
{
    public function bootstrap(Tenant $tenant)
    {
        // ...
    }
	
    public function revert()
    {
        // ...
    }
}
```

Then, register it in the `tenancy.bootstrappers` config:

```php
'bootstrappers' => [
    Stancl\Tenancy\Bootstrappers\DatabaseTenancyBootstrapper::class,
    Stancl\Tenancy\Bootstrappers\CacheTenancyBootstrapper::class,
    Stancl\Tenancy\Bootstrappers\FilesystemTenancyBootstrapper::class,
    Stancl\Tenancy\Bootstrappers\QueueTenancyBootstrapper::class,

    App\MyBootstrapper::class,
],
```