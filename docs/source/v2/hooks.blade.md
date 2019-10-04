---
title: Hooks / The Event System
description: Hooks / The Event System
extends: _layouts.documentation
section: content
---

# Hooks / The Event System

You can use event hooks to change the behavior of the tenancy bootstrapping and tenancy ending processes.

The following events are available:
- `bootstrapping`
- `bootstrapped`
- `ending`
- `ended`

### Tenant-specific database connection example {#tenant-specific-database-connection-example}

> Note: Tenant-specific DB connections can now be achieved using a first-class feature: [Custom DB connections]({{ $page->link('custom-db-connections') }})

You can hook into these events using `Tenancy::hook(<eventName>, function () {})`:
```php
\Tenancy::hook('bootstrapping', function ($tenantManager) {
    if ($tenantManager->tenant['id'] === 'someID') {
        config(['database.connections.someDatabaseConnection' => $tenantManager->tenant['databaseConnection']]);
        $tenantManager->database->useConnection('someDatabaseConnection');

        return ['database'];
    }
});
```

The example above checks whether the current tenant has an id of `someID`. If yes, it creates a new database connection based on data stored in the tenant's storage. Then it changes the default database connection. Finally, it returns an array of the events that this callback prevents.

The following actions can be prevented:
- database connection switch: `database`
- Redis prefix: `redis`
- CacheManager switch: `cache`
- Filesystem changes: `filesystem`
- Queue tenancy: `queue`
- and anything else listed in the [`tenancy.bootstrappers` config]({{ $page->link('configuration#bootstrappers') }})

### Tenant-specific configuration example {#tenant-specific-configuration-example}

Another common use case for events is tenant-specific config:
```php
\Tenancy::hook('bootstrapped', function ($tenantManager) {
    config(['some.api.key' => $tenantManager->tenant['api_key']);
});
```
