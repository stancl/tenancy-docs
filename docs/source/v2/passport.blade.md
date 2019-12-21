---
title: Passport Integration
description: Passport Integration
extends: _layouts.documentation
section: content
---

# Passport Integration {#passport-integration}

> If you just want to write an SPA, but don't need an API for some other use (e.g. mobile app), you can avoid **a lot** of the complexity of writing SPAs by using [Inertia.js](https://inertiajs.com).

To use Passport inside the tenant part of your application, you may do the following.

- Add this to the `register` method in your `AppServiceProvider`:
    ```php
    Passport::ignoreMigrations();
    Passport::routes(null, ['middleware' => 'tenancy']);
    ```
- `php artisan vendor:publish --tag=passport-migrations` & move to `database/migrations/tenant/` directory

## Shared keys

If you want to use the same keypair for all tenants, do the following.

- Don't use `passport:install`, use just `passport:keys`. The install command creates keys & two clients. Instead of creating clients centrally, create `Client`s manually in your [tenant database seeder]({{ $page->link('configuration/#seed-after-migration') }}).

## Tenant-specific keys

If you want to use a unique keypair for each tenant, do the following. (Note: The security benefit of doing this isn't probably that big, since you're likely already using the same `APP_KEY` for all tenants.)

There are multiple ways you can store & load tenant keys, but the most straightforward way is to store the keys in the [Tenant Storage]({{ $page->link('tenant-storage') }}) and load them into the `passport` configuration using the [Tenant Config]({{ $page->link('features/tenant-config') }}) feature:
- Uncomment the `TenantConfig` line in your `tenancy.features` config
- Add these keys to your `tenancy.storage_to_config_map` config:
    ```php
    'storage_to_config_map' => [
        'passport_public_key' => 'passport.public_key',
        'passport_private_key' => 'passport.private_key',
    ],
    ```

And again, you need to create clients in your tenant database seeding process.
