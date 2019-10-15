---
title: Nova Integration
description: Nova Integration
extends: _layouts.documentation
section: content
---

# Nova Integration {#nova-integration}

To make Nova part of your tenant application, do the following:
- Publish the Nova migrations and move them to the `database/migrations/tenant` directory.
    ```none
    php artisan vendor:publish --tag=nova-migrations
    ```
    > Note: Unfortunately, Nova will still be adding its migrations to your central migrations. This is something we'd like to solve in the future.
- Add the `tenancy` middleware group to your `nova.middleware` config. Example:
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
