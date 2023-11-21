---
title: Integration with Spatie packages
extends: _layouts.documentation
section: content
---

# Integration with Spatie packages {#integration-with-spatie-packages}

## **laravel-activitylog** {#laravel-activitylog}

> Note: The package requires logged models to have integer IDs. We recommend extra security measures when using integer IDs for tenants. Because the IDs become enumerable, they get vulnerable to enumeration attacks (which UUIDs are safe against).
> For example, to use the LogsActivity trait on the Tenant model, modify the model to have an integer ID.

### For the tenant app: {#for-the-tenant-app}

- Set the `database_connection` key in `config/activitylog.php` to `null`. This makes activitylog use the default connection.
- Publish the migrations and move them to `database/migrations/tenant`. (And, of course, don't forget to run `artisan tenants:migrate`.)

### For the central app: {#for-the-central-app}

- Set the `database_connection` key in `config/activitylog.php` to the name of your central database connection.

## **laravel-permission** {#laravel-permission}

Install the package like usual, but publish the migrations and move them to `migrations/tenant`:

```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
mv database/migrations/*_create_permission_tables.php database/migrations/tenant
```

Next, add the following listeners to the `TenancyBootstrapped` and `TenancyEnded` events to `events()` in your `TenancyServiceProvider`:

```php
Events\TenancyBootstrapped::class => [
    function (Events\TenancyBootstrapped $event) {
        $permissionRegistrar = app(\Spatie\Permission\PermissionRegistrar::class);
        $permissionRegistrar->cacheKey = 'spatie.permission.cache.tenant.' . $event->tenancy->tenant->getTenantKey();
    }
],

Events\TenancyEnded::class => [
    function (Events\TenancyEnded $event) {
        $permissionRegistrar = app(\Spatie\Permission\PermissionRegistrar::class);
        $permissionRegistrar->cacheKey = 'spatie.permission.cache';
    }
],
```

Alternatively, create a bootstrapper:

```php
class SpatiePermissionsBootstrapper implements TenancyBootstrapper
{
    public function __construct(
        protected PermissionRegistrar $registrar,
    ) {}

    public function bootstrap(Tenant $tenant): void
    {
        $this->registrar->cacheKey = 'spatie.permission.cache.tenant.' . $tenant->getTenantKey();
    }

    public function revert(): void
    {
        $this->registrar->cacheKey = 'spatie.permission.cache';
    }
}
```

The reason for this is that spatie/laravel-permission caches permissions & roles to save DB queries, which means that we need to separate the permission cache by tenant. We also need to reset the cache key when tenancy ends so that the tenant's cache key isn't used in the central app.

## **laravel-medialibrary** {#laravel-medialibrary}

To generate the correct media URLs for tenants, create a custom URL generator class extending `Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator` and override the `getUrl()` method:

```php
use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class TenantAwareUrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        $url = asset($this->getPathRelativeToRoot());

        $url = $this->versionUrl($url);

        return $url;
    }
}
```

Then, change the `url_generator` in the media-library config to the custom one (make sure to import it):

```php
'url_generator' => TenantAwareUrlGenerator::class,
```

## **laravel-login-link** {#laravel-login-link}

After installing the package, publish the config file:

```sh
php artisan vendor:publish --tag="login-link-config"
```

After that, add your [tenant identification]({{ $page->link('tenant-identification') }}) middlewares to the config file's `middleware` key:

```php
'middleware' => [
    'web',
    // Add whatever tenant identification middlewares you use in your tenant routes
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
],
```
