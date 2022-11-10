---
title: Tenant maintenance mode
extends: _layouts.documentation
section: content
---

# Tenant maintenance mode {#tenant-maintenance-mode}

You may put specific tenants into maintenance mode using the `MaintenanceMode` trait.

Apply it on your [Tenant model]({{ $page->link('tenants') }}):

```php
use Stancl\Tenancy\Database\Concerns\MaintenanceMode;

class Tenant extends BaseTenant
{
    use MaintenanceMode;
}
```

This will let you use the following method on each tenant object:
```php
$tenant->putDownForMaintenance();
```

To remove specific tenant from maintenance mode:
```php
$tenant->update(['maintenance_mode' => null]);
```

## Middleware {#middleware}

You will also need to use the `Stancl\Tenancy\Middleware\CheckTenantForMaintenanceMode` middleware on your tenant routes.
