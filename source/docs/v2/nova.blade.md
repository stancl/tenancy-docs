---
title: Nova Integration
description: Nova Integration
extends: _layouts.documentation
section: content
---

# Nova Integration {#nova-integration}

To use Nova inside of the tenant part of your application, do the following:
- Publish the Nova migrations and move them to the `database/migrations/tenant` directory.
    ```none
    php artisan vendor:publish --tag=nova-migrations
    ```
- Prevent Nova from adding its migrations to your central migrations by adding `Nova::ignoreMigrations()` to `NovaServiceProvider::boot()` (Don't do this if you want to use Nova [both in the central & tenant parts]({{ $page->link('universal-routes') }}) of the app.)
- Add the `'tenancy'` middleware group to your `nova.middleware` config. Example:
    ```php
    'middleware' => [
        'tenancy',
        'web',
        Authenticate::class,
        DispatchServingNovaEvent::class,
        BootTools::class,
        Authorize::class,
    ],
    ```
- In your `NovaServiceProvider`'s `routes()` method, replace the following lines:
    ```php
    ->withAuthenticationRoutes()
    ->withPasswordResetRoutes()
    ```
    with these lines:
    ```php
    ->withAuthenticationRoutes(['web', 'tenancy'])
    ->withPasswordResetRoutes(['web', 'tenancy'])
    ```
