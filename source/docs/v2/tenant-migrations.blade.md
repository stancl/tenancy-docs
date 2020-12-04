---
title: Tenant Migrations
description: Tenant Migrations
extends: _layouts.documentation
section: content
---

# Tenant Migrations {#tenant-migrations}

You can run tenant migrations using the `php artisan tenants:migrate` command.

You may specify the tenant(s) using the `--tenants` option.

```
php artisan tenants:migrate --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23
```

> Note: Tenant migrations must be located in `database/migrations/tenant`.

You can run migrations from outside the command line as well. To run migrations for a tenant in your code, use `Artisan::call()`:

```php
$tenant = \Tenant::create('tenant1.localhost');

\Artisan::call('tenants:migrate', [
    '--tenants' => [$tenant->id]
]);
```

You may also [configure]({{ $page->link('configuration#migrate-after-creation') }}) the package to run migrations automatically, after creating tenants.
