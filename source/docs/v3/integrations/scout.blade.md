---
title: Laravel Scout integration
extends: _layouts.documentation
section: content
---

# Laravel Scout {#laravel-scout}
After [installing Scout](https://laravel.com/docs/9.x/scout#installation), make sure the models of all tenants aren't being imported in the same index by prefixing the model indices with the current tenant's key. You can achieve that by adding a listener with this code to the TenancyInitialized event in your TenancyServiceProvider:

```php
config(['scout.prefix' => tenant()->getTenantKey()]);
```

After that, you can import your existing records for each tenant using the `tenants:run` command:

```
php artisan tenants:run scout:import --argument="model=App\Models\YourSearchableModel"
```
