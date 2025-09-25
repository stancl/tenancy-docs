---
title: Tenant-aware commands
description: Tenant-aware commands
extends: _layouts.documentation
section: content
---

# Tenant-aware commands {#tenant-aware-commands}

Even though [`tenants:run`]({{ $page->link('console-commands#run') }}) lets you run arbitrary artisan commands for tenants, you may want to have strictly tenant commands.

To make a command tenant-aware, utilize the `TenantAwareCommand` trait:
```php
use Stancl\Tenancy\Concerns\TenantAwareCommand;

class MyCommand extends Command
{
    use TenantAwareCommand;
}
```

However, this trait requires you to implement a `getTenants()` method that returns an array of `Tenant` instances.

If you don't want to implement the options/arguments yourself, you may use one of these two traits:
- `Stancl\Tenancy\Concerns\HasATenantsOption` - accepts multiple tenant IDs, optional -- by default the command is executed for all tenants
- `Stancl\Tenancy\Concerns\HasATenantArgument` - accepts a single tenant ID, required argument

These traits implement the `getTenants()` method needed by `TenantAwareCommand`.

> Note: If you're using a custom constructor for your command, you need to add `$this->specifyParameters()` at the end for the option/argument traits to take effect.

So if you use these traits in combination with `TenantAwareCommand`, you won't have to change a thing in your command:

```php

use Stancl\Tenancy\Concerns\TenantAwareCommand;
use Stancl\Tenancy\Concerns\HasATenantsOption;

class FooCommand extends Command
{
    use TenantAwareCommand, HasATenantsOption;

    public function handle()
    {
        //
    }
}

use Stancl\Tenancy\Concerns\TenantAwareCommand;
use Stancl\Tenancy\Concerns\HasATenantArgument;

class BarCommand extends Command
{
    use TenantAwareCommand, HasATenantArgument;

    public function handle()
    {
        //
    }
}
```

### Custom implementation {#custom-implementation}

If you want more control, you may implement this functionality yourself by simply accepting a `tenant_id` argument and then inside `handle()` doing something like this:
```php
tenancy()->find($this->argument('tenant_id'))->run(function () {
    // Your actual command code
});
```
