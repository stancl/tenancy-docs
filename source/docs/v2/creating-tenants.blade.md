---
title: Creating Tenants
description: Creating tenants
extends: _layouts.documentation
section: content
---

# Creating Tenants {#creating-tenants}

> **Make sure your database is correctly [configured]({{ $page->link('configuration/#database') }}) before creating tenants.**

To create a tenant, you can use

```php
use Stancl\Tenancy\Tenant;

Tenant::new()
    ->withDomains(['tenant1.yourapp.com', 'tenant1.com'])
    ->withData(['plan' => 'free'])
    ->save();
```

> Tip: All domains under `.localhost` are routed to 127.0.0.1 on most operating systems. This is useful for development.

The `withDomains()` and `withData()` methods are optional.

You can also create a tenant using a single method: `Tenant::create`:

```php
$domains = ['tenant1.myapp.com', 'tenant1.com'];
Tenant::create($domains, [
    'plan' => 'free',
]);
```

`Tenant::create()` works with both `Stancl\Tenancy\Tenant` and the facade, `\Tenant`.

> Note: By default, creating a tenant doesn't run [migrations]({{ $page->link('tenant-migrations' )}}) automatically. You may change this behavior using the `migrate_after_creation` [configuration]({{ $page->link('configuration#migrate-after-creation') }}).