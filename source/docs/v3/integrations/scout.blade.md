---
title: Laravel Scout integration
extends: _layouts.documentation
section: content
---

# Laravel Scout {#laravel-scout}
> Note: Make sure the Scout config file is published

After [installing Scout](https://laravel.com/docs/9.x/scout#installation), add `ScoutTenancyBootstrapper` to the bootstrappers in your Tenancy config (`config/tenancy.php`):

```php
'bootstrappers' => [
    ...
    Stancl\Tenancy\Bootstrappers\Integrations\ScoutTenancyBootstrapper::class,
],
```

This makes sure the models of all tenants aren't being imported in the same index by prefixing the model indices with the current tenant's key.

You can import your existing records for each tenant using the `tenants:run` command:

```
php artisan tenants:run scout:import --argument="model=App\Models\YourSearchableModel"
```
