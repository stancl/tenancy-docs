---
title: Laravel Nova integration
extends: _layouts.documentation
section: content
---

# Laravel Nova

## In the central app

If you wish to use Laravel Nova in the central application (to manage tenants), you need to make a small change to the Nova migrations, they expect your model primary keys to always be unsigned big integers, but your tenants might be using `string` ids.

You can find the full Nova setup for managing tenants in the [SaaS boilerplate](/saas-boilerplate):

## In the tenant app

To use Nova inside of the tenant part of your application, do the following:

- Publish the Nova migrations and move them to the `database/migrations/tenant` directory.

    ```
    php artisan vendor:publish --tag=nova-migrations
    ```

- Prevent Nova from adding its migrations to your central migrations by adding `Nova::ignoreMigrations()` to `NovaServiceProvider::boot()` (Don't do this if you want to use Nova **[both in the central & tenant parts]({{ $page->link('features/universal-routes') }})** of the app.)
- Add the tenancy middleware to your `nova.middleware` config. Example:

    ```php
    'middleware' => [
        // You can make this simpler by creating a tenancy route group
        InitializeTenancyByDomain::class,
        PreventAccessFromCentralDomains::class,
        'web',
        Authenticate::class,
        DispatchServingNovaEvent::class,
        BootTools::class,
        Authorize::class,
    ],
    ```

- In your `NovaServiceProvider`'s `routes()` method, replace the following lines:

    ```php
    ->withAuthenticationRoutes()
    ->withPasswordResetRoutes()
    ```

    with these lines:

    ```php
    ->withAuthenticationRoutes(['web', 'tenancy'])
    ->withPasswordResetRoutes(['web', 'tenancy'])
    ```