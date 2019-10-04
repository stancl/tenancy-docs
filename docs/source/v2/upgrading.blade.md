---
title: Upgrading
description: Upgrading
extends: _layouts.documentation
section: content
---

# Upgrading from 1.x {#upgrading}

The 2.0.0 release is essentialy a ~60% rewrite, with 3,187 additions and 1,896 deletions (lines of code). Version 2 introduces Laravel 6 support and drops Laravel 5.8 support.

This guide attempts to cover the main changes that were made to the package. The rewrite was mainly:
- an internal thing: much better code quality means much better maintainability and much more features in the future :)
- to provide a nicer API for working with tenants

Even though new syntax was one of the main goals, the rewrite was made with backwards compatibility in mind, so many old methods still work.

If you're coming from 1.x, it's recommended to read (or at least skim through) the entire documentation again.

## Main changes

- `Tenant` objects are now used, instead of arrays, to represent tenants. See the [Tenants]({{ $page->link('tenants') }}) page.
- Tenants can now have multiple domains, so a new `domains` table is used by the DB storage driver.
- The `uuid` property on tenants is now `id`.
- `tenancy()` helper now returns an instance of `TenantManager` while the `tenant()` helper returns an instance of the current `Tenant`. If no `Tenant` has been identified, `null` is returned. Same with the `Tenancy` and `Tenant` facades.
- Event listeners/hooks have a new syntax: `Tenancy::eventListener('bootstrapping', function () {})`
- The tenancy bootstrapping logic has been extracted into separate classes, such as `DatabaseTenancyBootstrapper`, `CacheTenancyBootstrapper` etc.
- A concept of `Feature`s was introduced. They're classes that provide additional functionality - functionality that is not necessary to bootstrap tenancy.
- predis support was dropped. Laravel will drop predis support in 7.x.
- There is new syntax for [creating]({{ $page->link('creating-tenants') }}) and [interacting]({{ $page->link('tenants') }}) with tenants, be sure to read those documentation pages again.
- The config was changed *a lot*, so you should publish and configure it again.
    You can publish the configuration like this:
    ```none
    php artisan vendor:publish --provider='Stancl\Tenancy\TenancyServiceProvider' --tag=config
    ```

## DB storage driver
- The `uuid` column in the `tenants` table was renamed to `id`. The `domain` column was dropped.
- A new migration was added to create the `domains` table. **The old migration was renamed**, so if you publish migrations again, be sure to delete the old migration, to avoid creating the table twice.
    You can publish migrations like this:
    ```none
    php artisan vendor:publish --provider='Stancl\Tenancy\TenancyServiceProvider' --tag=migrations
    ```

## Redis storage driver

- The `uuid` keys are now `id`.
- The `domain` key was dropped.
- The `_tenancy_domains` key is used to store an array of domains that belong to the tenant.

## New Features

- [Tenant Config]({{ $page->link('tenant-config') }})
- [Migrate Fresh]({{ $page->link('commands#migrate-fresh') }})
- [`tenants:create`]({{ $page->link('commands#create-tenant') }})
