---
title: Custom Database Connections
description: Custom Database Connections
extends: _layouts.documentation
section: content
---

# Custom Database Connections {#custom-database-names}

To set a specific database connection for a tenant, set the `_tenancy_db_connection` key in the tenant's storage. The connection's database name will be still replaced by the tenant's database name. You can [customize that]({{ $page->link('custom-database-names') }}) too.

You may want custom connections to be dynamic (rather than adding them to the DB config manually), so can use something like this:

```php
// Make new tenants use your connection "template"
Tenant::new()->withData([
    '_tenancy_db_connection' => 'someTenantConnectionTemplate',
]);

// Make tweaks to the connection before bootstrapping tenancy
tenancy()->hook('bootstrapping', function ($tenantManager) {
    config(['database.connections.someTenantConnectionTemplate.name' => $tenantManager->getTenant('database_name')]);
    config(['database.connections.someTenantConnectionTemplate.password' => $tenantManager->getTenant('database_password')]);
    config(['database.connections.someTenantConnectionTemplate.host' => $tenantManager->getTenant('database_host')]);
});
```
