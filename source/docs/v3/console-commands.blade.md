---
title: Console commands
extends: _layouts.documentation
section: content
---


# Console commands {#console-commands}

The package comes with some useful artisan commands.

Tenant-aware commands run for all tenants by default. The commands also have the `--tenants` option which lets you specify keys of the tenants for which the command will run.

> Note: To include multiple tenants using CLI, you can use multiple `--tenants=<...>` options. If you're calling the command using `Artisan::call()`, `--tenants` has to be an array.

## **Migrate** (tenant-aware) {#migrate}

The `tenants:migrate` command migrates databases of your tenants.

```
php artisan tenants:migrate --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23
```

> Note: By default, the migrations should be in database/migrations/tenant. If you wish to use a different path, you may use the `--path` option. You can also specify the default parameters for the command [in the tenancy config]({{ $page->link('configuration#migration-parameters') }})

## **Rollback & seed** (tenant-aware) {#rollback-and-seed}

- Rollback: `tenants:rollback`
- Seed: `tenants:seed`

> Note: You can configure the default parameters for `tenants:seed` (e.g. use a custom tenant seeder) in [the tenancy config]({{ $page->link('configuration#seeder-parameters') }})

## **Migrate fresh** (tenant-aware) {#migrate-fresh}

This package also offers a simplified, tenant-aware version of `migrate:fresh`. It runs `db:wipe` and `tenants:migrate` on the tenant's database.

You may use it like this:

```
php artisan tenants:migrate-fresh --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23
```

## **Run** (tenant-aware) {#run}

You can use the `tenants:run` command to run your own commands for tenants.

If your command's signature were `email:send {--queue} {--subject=} {body}`, you would run this command like this:

```
php artisan tenants:run email:send --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23 --option="queue=1" --option="subject=New Feature" --argument="body=We have launched a new feature. ..."
```

or using `Artisan::call()`:

```php
Artisan::call('tenants:run', [
    'commandname' => 'email:send', // String
    '--tenants' => ['8075a580-1cb8-11e9-8822-49c5d8f8ff23'] // Array
    '--option' => ['queue=1', 'subject=New Feature'] // Array
    '--argument' => ['body=We have launched a new feature.'] // Array
])
```
## **List** {#list}

The `tenants:list` command lists all existing tenants.

```
php artisan tenants:list
Listing all tenants.
[Tenant] id: dbe0b330-1a6e-11e9-b4c3-354da4b4f339 @ localhost
[Tenant] id: 49670df0-1a87-11e9-b7ba-cf5353777957 @ dev.localhost
```

## **Selectively clearing tenant cache** {#selectively-clearing-tenant-cache}

You can delete specific tenants' cache by using the `--tags` option on `cache:clear`:

```
php artisan cache:clear --tags=tenantdbe0b330-1a6e-11e9-b4c3-354da4b4f339
```

The tag is derived from `config('tenancy.cache.tag_base') . $tenantKey`.
