---
title: Hooks / The Event System
description: Hooks / The Event System
extends: _layouts.documentation
section: content
---

# Hooks / The Event System

You can use event hooks to change the behavior of the package.

All hook callbacks receive the `TenantManager` as the first argument.

## Tenant events

A common use case for these events is seeding the tenant data during creation:
```php
// AppServiceProvider::boot()
tenancy()->hook('tenant.creating', function (TenantManager $tm, Tenant $tenant) {
    $tenant->put([
        'posts_per_page' => '15',
    ]);
});
```

The following events are available:
- `tenant.creating`
- `tenant.created`
- `tenant.updating`
- `tenant.updated`
- `tenant.deleting`
- `tenant.deleted`
- `tenant.softDeleting`
- `tenant.softDeleted`

Callbacks for these events may accept the following arguments:
```php
TenantManager $tenantManager, Tenant $tenant
```

## Database events

A use case for these events is executing something after the tenant database is created (& migrated/seeded) without running into race conditions.

Say you have a `AfterCreatingTenant` job that creates a superadmin user. You may use the `database.creating` event to add this job into the queue chain of the job that creates the tenant's database.
```php
tenancy()->hook('database.creating', function (TenantManager $tm, string $db, Tenant $tenant) {
    return [
        new AfterCreatingTenant($tenant->id);
    ]
});
```

The following events are available:
- `database.creating`
- `database.created`
- `database.deleting`
- `database.deleted`

Callbacks for these events may accept the following arguments:
```php
TenantManager $tenantManager, string $db, Tenant $tenant
```

## Bootstrapping/ending events

The following events are available:
- `bootstrapping`
- `bootstrapped`
- `ending`
- `ended`

You may use the `bootstrapping` & `ending` events to prevent some bootstrappers from being executed.

The following actions can be prevented:
- database connection switch: `database`
- Redis prefix: `redis`
- CacheManager switch: `cache`
- Filesystem changes: `filesystem`
- Queue tenancy: `queue`
- and anything else listed in the [`tenancy.bootstrappers` config]({{ $page->link('configuration#bootstrappers') }})

Callbacks for these events may accept the following arguments:
```php
TenantManager $tenantManager, Tenant $tenant
```