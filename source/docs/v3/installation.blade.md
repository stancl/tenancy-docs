---
title: Installation
extends: _layouts.documentation
section: content
---

# Installation {#installation}

Laravel 6.0 or higher is needed.

Require the package using composer:

```php
composer require stancl/tenancy
```

Then run the following command:

```php
php artisan tenancy:install
```

It will create:

- migrations
- a config file (`config/tenancy.php`),
- a routes file (`routes/tenant.php`),
- and a service provider file `app/Providers/TenancyServiceProvider.php`

Then add the service provider to your `config/app.php` file:

```php
/*
 * Application Service Providers...
 */
App\Providers\AppServiceProvider::class,
App\Providers\AuthServiceProvider::class,
// App\Providers\BroadcastServiceProvider::class,
App\Providers\EventServiceProvider::class,
App\Providers\RouteServiceProvider::class,
App\Providers\TenancyServiceProvider::class, // <-- here
```

And finally, if you want to use a different central database than the one defined by `DB_CONNECTION` in the file `.env`, name your central connection (in `config/database.php`) `central` — or however else you want, but make sure it's the same name as the `tenancy.central_connection` config.
