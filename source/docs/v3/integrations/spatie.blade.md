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

Then add this to your `TenancyServiceProvider::boot()`:

```php
Event::listen(TenancyBootstrapped::class, function (TenancyBootstrapped $event) {
    \Spatie\Permission\PermissionRegistrar::$cacheKey = 'spatie.permission.cache.tenant.' . $event->tenancy->tenant->id;
});

Event::listen(TenancyEnded::class, function (TenancyEnded $event) {
    \Spatie\Permission\PermissionRegistrar::$cacheKey = 'spatie.permission.cache';
});
```

The reason for this is that spatie/laravel-permission caches permissions & roles to save DB queries, which means that we need to separate the permission cache by tenant.

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
