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
class MyCommand extends Command
{
    use TenantAwareCommand;
}
```

However, this trait requires you to implement a `getTenants()` method that returns an array of `Tenant` instances.

If you don't want to implement the method yourself, you may use the `HasTenantOptions` trait. The trait also adds two options to your command:

- `--tenants` – Accepts IDs of the tenants for which the command should run (optional, if empty, run the command for all tenants)
- `--with-pending` – Specify if the command should also run for the pending tenants (optional, boolean) // todo@pendingTenantsDocumentation

> Note: If you're using a custom constructor for your command, you need to add `$this->specifyParameters()` at the end for the trait to take effect.

So if you use the `TenantAwareCommand` trait in combination with `HasTenantOptions`, you won't have to change a thing in your command:

```php
class FooCommand extends Command
{
    use TenantAwareCommand, HasTenantOptions;

    public function handle()
    {
        //
    }
}
```

### Custom implementation

If you want more control, you may implement this functionality yourself by simply accepting a `tenant_id` argument and then inside `handle()` doing something like this:
```php
tenancy()->find($this->argument('tenant_id'))->run(function () {
    // Your actual command code
});
```
