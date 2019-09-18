---
title: Creating Tenants
description: Creating tenants with stancl/tenancy — A Laravel multi-database tenancy package that respects your code..
extends: _layouts.documentation
section: content
---

# Creating Tenants {#creating-tenants}

> **Make sure your database is correctly [configured]({{ $page->link('configuration/#database') }}) before creating tenants.**

To create a tenant, you can use

```php
Tenant::new()->withDomains(['tenant1.yourapp.com'])->withData(['plan' => 'free'])->save();
```

> Tip: All domains under `.localhost` are routed to 127.0.0.1 on most operating systems. This is useful for development.

The `withDomains()` and `withData()` methods are optional.

You can also create a tenant using the `Tenant::create` method:

```php
$domains = ['tenant1.myapp.com', 'tenant1.com'];
Tenant::create($domains, [
    'plan' => 'free',
]);
```

> Note: Creating a tenant doesn't run [migrations](https://stancl-tenancy.netlify.com/docs/console-commands/#migrate) automatically. You have to do that yourself. <!-- TODO auto migrate after creation -->