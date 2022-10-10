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
The filesystem bootstrapper makes your app's `Storage` facade and the `storage_path()` and `asset()` helpers tenant-aware by modifying the paths they return.

> Note: If you want to bootstrap filesystem tenancy differently (e.g. provision an S3 bucket for each tenant), you can absolutely do that. Take a look at the package's bootstrappers to get an idea of how to write one yourself, and feel free to implement it any way you want.

### Storage path helper

The bootstrapper suffixes the path returned by `storage_path()` to make the helper tenant-aware.

- The suffix is built by appending the tenant key to your `suffix_base`. The `suffix_base` is `tenant` by default, but feel free to change it in the `tenancy.filesystem` config. For example, the suffix will be `tenant42` if the tenant's key is `42` and the `suffix_base` is `tenant`.
- After the suffixing, `storage_path()` helper returns `"/$path_to_your_application/storage/tenant42/"`

Since `storage_path()` will be suffixed, your folder structure will look like this:

![The folder structure](/assets/images/file_structure_tenancy.png)

Logs will be saved in `storage/logs` regardless of any changes to `storage_path()` and regardless of the tenant.

### Storage facade

The bootstrapper also makes the `Storage` facade tenant-aware by suffixing the roots of disks listed in `config('tenancy.filesystem.disks')` and by overriding the disk roots in `config('tenancy.filesystem.root_override')` (disk root = the disk path used by the `Storage` facade).

The root of each disk listed in `config('tenancy.filesystem.disks')` will be suffixed. Doing that alone could cause unwanted behavior since Laravel does its own suffixing, so the filesystem config has the `root_override` section, which lets you override the disk roots **after** tenancy has been initialized:

```php
// Tenancy config (tenancy.filesystem.root_override)
// %storage_path% gets replaced by storage_path()'s output
// E.g. Storage::disk('local')->path('') will return "/$path_to_your_application/storage/tenant42/app"
// (Given a suffix_base of 'tenant' and a tenant with a key of `42`. Same as in the example above in the Storage path helper section)
'root_override' => [
    'local' => '%storage_path%/app/',
    'public' => '%storage_path%/app/public/',
],
```

To make the tenant-aware `Storage` facade work with a custom disk, add the disk's name to `config('tenancy.filesystem.disks')` and if the disk is local, override its root in `config('tenancy.filesystem.root_override')` as shown above. With S3, overriding the disk roots is not necessary – `Storage::disk('s3')->path('foo.txt')` will return `/tenant42/foo.txt`.

### Assets

The filesystem bootstrapper makes the `asset()` helper link to the files *of the current tenant*. By default, the bootstrapper makes the helper output a URL pointing to the TenantAssetsController (`/tenancy/assets/...`), which returns a file response:

```php
// TenantAssetsController
return response()->file(storage_path('app/public/' . $path));
```

The package expects the assets to be stored in your tenant's `app/public/` directory. For global assets (non-private assets shared among all tenants), you may want to create a disk and use URLs from that disk instead. For example:

```php
Storage::disk('branding')->url('header-logo.png');
```

To access global assets such as JS/CSS assets, you can use `global_asset()` and `mix()`.

Configuring the asset URL (`ASSET_URL` in your `.env`) changes the `asset()` helper's behavior – when the asset URL is set, the bootstrapper will suffix the configured asset URL (the same way `storage_path()` gets suffixed), and make the `asset()` helper output that instead of a path to the TenantAssetsController.

You can disable tenancy of `asset()` in the config (`tenancy.filesystem.asset_helper_tenancy`) and explicitly use `tenant_asset()` instead. `tenant_asset()` **always** returns a path to the TenantAssetController: `tenant_asset('foo.txt')` returns `your-site.com/tenancy/assets/foo.txt`. You may want to do that if you're facing issues using a package that utilizes `asset()` inside the tenant app.

Before using the `asset()` helper, make sure to [assign the identification middleware you're using in your app to TenantAssetsController's `$tenancyMiddleware`]({{ $page->link('configuration#static-properties') }}):

```php
// TenancyServiceProvider (don't forget to import the classes)

public function boot()
{
    // Update the middleware used by the asset controller
    TenantAssetsController::$tenancyMiddleware = InitializeTenancyByDomainOrSubdomain::class;
}
```

## Queue tenancy bootstrapper {#queue-tenancy-bootstrapper}

This bootstrapper adds the current tenant's ID to the queued job payloads, and initializes tenancy based on this ID when jobs are being processed.

The bootstrapper has a static `$forceRefresh` property which is `false` by default. Setting the property to `true` will make tenancy re-initialize for each queued job. This is useful when you're changing the tenant's state (e.g. properties in the `data` column) and want the next job to initialize tenancy again with the new data. Features like the Tenant Config are only executed when tenancy is initialized, so the re-initialization is needed in some cases.

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
