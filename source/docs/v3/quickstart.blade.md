---
title: Quickstart Tutorial
extends: _layouts.documentation
section: content
---

# Quickstart Tutorial {#quickstart-tutorial}

This tutorial focuses on getting you started with stancl/tenancy 3.x quickly. It implements multi-database tenancy & domain identification. If you need a different implementation, then **that's absolutely possible with this package** and it's very easy to refactor to a different implementation.

We recommend following this tutorial just **to get things working** so that you can play with the package. Then if you need to, you can refactor the details of the multi-tenancy implementation (e.g. single-database tenancy, request data identification, etc).

## Installation {#installation}

First, require the package using composer:

```php
composer require stancl/tenancy
```

Then, run the `tenancy:install` command:

```php
php artisan tenancy:install
```

This will create a few files: migrations, config file, route file and a service provider.

Let's run the migrations:

```php
php artisan migrate
```

Register the service provider in `config/app.php`. Make sure it's on the same position as in the code snippet below:

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

## Creating a tenant model {#creating-a-tenant-model}

Now you need to create a Tenant model. The package comes with a default Tenant model that has many features, but it attempts to be mostly unopinonated and as such, we need to create a custom model to use domains & databases. Create the file `app/Models/Tenant.php` like this:

```php
<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
}
```

*Please note: if you have the models anywhere else, you should adjust the code and commands of this tutorial accordingly.*

Now we need to tell the package to use this custom model. Open the `config/tenancy.php` file and modify the line below:

```php
'tenant_model' => \App\Models\Tenant::class,
```

## Events {#events}

The defaults will work out of the box here, but a short explanation will be useful. The `TenancyServiceProvider` file in your `app/Providers` directory maps tenancy events to listeners. By default, when a tenant is created, it runs a `JobPipeline` (a smart thing that's part of this package) which makes sure that the `CreateDatabase`, `MigrateDatabase` and optionally other jobs (e.g. `SeedDatabase`) are ran sequentially.

In other words, it creates & migrates the tenant's database after he's created — and it does this in the correct order, because normal event-listener mapping would execute the listeners in some stupid order that would result in things like the database being migrated before it's created, or seeded before it's migrated.

## Central routes {#central-routes}

We'll make a small change to the `app/Providers/RouteServiceProvider.php` file. Specifically, we'll make sure that central routes are registered on central domains only. 

```php
protected function mapWebRoutes()
{
    foreach ($this->centralDomains() as $domain) {
        Route::middleware('web')
            ->domain($domain)
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}

protected function mapApiRoutes()
{
    foreach ($this->centralDomains() as $domain) {
        Route::prefix('api')
            ->domain($domain)
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}

protected function centralDomains(): array
{
    return config('tenancy.central_domains');
}
```

Call these methods manually from your `RouteServiceProvider`'s `boot()` method, instead of the `$this->routes()` calls.

```php
public function boot()
{
    $this->configureRateLimiting();

    $this->mapWebRoutes();
    $this->mapApiRoutes();
}
```

## Central domains {#central-domains}

Now we need to actually specify the central domains. A central domain is a domain that serves your "central app" content, e.g. the landing page where tenants sign up. Open the `config/tenancy.php` file and add them in:

```php
'central_domains' => [
    'saas.test', // Add the ones that you use. I use this one with Laravel Valet.
],
```

If you're using Laravel Sail, no changes are needed, default values are good to go:

```php
'central_domains' => [
    '127.0.0.1',
    'localhost',
],
```

## Tenant routes {#tenant-routes}

Your tenant routes will look like this by default:

```php
Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});
```

These routes will only be accessible on tenant (non-central) domains — the `PreventAccessFromCentralDomains` middleware enforces that.

Let's make a small change to dump all the users in the database, so that we can actually see multi-tenancy working. Open the file `routes/tenant.php` and apply the modification below:

```php
Route::get('/', function () {
    dd(\App\Models\User::all());
    return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
});
```

## Migrations {#migrations}

To have users in tenant databases, let's move the `users` table migration (the file `database/migrations/2014_10_12_000000_create_users_table.php` or similar) to `database/migrations/tenant`. This will prevent the table from being created in the central database, and it will be instead created in the tenant database when a tenant is created — thanks to our event setup.

## Creating tenants {#creating-tenants}

> Note: If you're using Laravel [Sail](https://laravel.com/docs/9.x/sail), ensure that `DB_USERNAME` has the necessary permissions to create databases. You can grant access to users by running the following command in MySQL console `grant create on *.* to 'sail'@'%';`.

For testing purposes, we'll create a tenant in `tinker` — no need to waste time creating controllers and views for now.

```php
$ php artisan tinker
>>> $tenant1 = App\Models\Tenant::create(['id' => 'foo']);
>>> $tenant1->domains()->create(['domain' => 'foo.localhost']);
>>>
>>> $tenant2 = App\Models\Tenant::create(['id' => 'bar']);
>>> $tenant2->domains()->create(['domain' => 'bar.localhost']);
```

Now we'll create a user inside each tenant's database:

```php
App\Models\Tenant::all()->runForEach(function () {
    App\Models\User::factory()->create();
});
```

## Trying it out {#trying-it-out}

Now we visit `foo.localhost` in our browser, replace `localhost` with one of the values of `central_domains` in the file `config/tenancy.php` as modified previously. We should see a dump of the users table where we see some user. If we visit `bar.localhost`, we should see a different user.
