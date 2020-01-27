---
title: Integration with Spatie packages
description: Integration with Spatie packages
extends: _layouts.documentation
section: content
---

# Integration with Spatie packages {#integration-with-spatie-packages}

## laravel-activitylog {#activitylog}

### For the tenant app: {#activitylog-tenant}
- Set the `database_connection` key in `config/activitylog.php` to `null`. This makes activitylog use the default connection.
- Publish the migrations and move them to `database/migrations/tenant`. (And, of course, don't forget to run `artisan tenants:migrate`.)

### For the central app: {#activitylog-central}
- Set the `database_connection` key in `config/activitylog.php` to the name of your central database connection.

## laravel-permission {#permission}

Install the package like usual, but publish the migrations and move them to `migrations/tenant`:

```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
mv database/migrations/*_create_permission_tables.php database/migrations/tenant
```

Then add this to your `AppServiceProvider::boot()` method:

```php
tenancy()->hook('bootstrapped', function (TenantManager $tenantManager) {
    \Spatie\Permission\PermissionRegistrar::$cacheKey = 'spatie.permission.cache.tenant.' . $tenantManager->getTenant('id');
});
```

The reason for this is that spatie/laravel-permission caches permissions & roles to save DB queries, which means that we need to separate the permission cache by tenant.
