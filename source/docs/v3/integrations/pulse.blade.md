---
title: Laravel Pulse integration
extends: _layouts.documentation
section: content
---

# Laravel Pulse {#laravel-pulse}

To run Laravel Pulse in the main application, set the PULSE_DB_CONNECTION in the Pulse configuration file to point to the central database connection.

If you need to resolve the user from the tenant database, you should create a custom user resolver that implements the ResolvesUsers interface.

```php 
class TenantUserResolver implements ResolvesUsers
{
    public function key($user): int|string|null
    {
        return implode(':', [tenant()->name, $user->name]);
    }

    public function load(Collection $keys): self
    {
        return $this;
    }

    public function find(int|string|null $key): object
    {
        [$tenant, $user] = explode(':', $key);

        return (object) [
            'name'  => $user,
            'extra' => $tenant,
        ];
    }
}
```

Next, register this resolver in the AppServiceProvider:
```php
$this->app->singleton(ResolvesUsers::class, TenantUserResolver::class);
```