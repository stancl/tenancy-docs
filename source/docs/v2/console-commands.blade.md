---
title: Console Commands
description: Console commands..
extends: _layouts.documentation
section: content
---

# Console Commands {#console-commands}

The package comes with some artisan commands that will help you during development.

## Migrate {#migrate}

The most important command. To use tenants, you have to be able to migrate their databases.

You can use the `tenants:migrate` command to migrate tenant's databases. You can also specify which tenants' databases should be migrated using the `--tenants` option.
```
php artisan tenants:migrate --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23
```

You may use multiple `--tenants=<...>` options.

> Note: Tenant migrations must be located in `database/migrations/tenant`.

You can use these commands outside the command line as well. If you want to migrate a tenant's database in a controller, you can use the `Artisan` facade.
```php
$tenant = tenancy()->create('tenant1.localhost');

\Artisan::call('tenants:migrate', [
    '--tenants' => [$tenant['id']]
]);
```

## Rollback & seed {#rollback}

- Rollback: `tenants:rollback`
- Seed: `tenants:seed`

Similarly to [migrate](#migrate), these commands accept a `--tenants` option.

## Migrate fresh {#migrate-fresh}

This package also offers a simplified, tenant-aware version of `migrate:fresh`. It runs `db:wipe` and `tenants:migrate` on the tenant's database.

You may use it like this:

```none
php artisan tenants:migrate-fresh --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23
```

## Run {#run}

You can use the `tenants:run` command to run your own commands for tenants.

If your command's signature were `email:send {--queue} {--subject=} {body}`, you would run this command like this:
```
php artisan tenants:run email:send --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23 --option="queue=1" --option="subject=New Feature" --argument="body=We have launched a new feature. ..."
```

## Tenant list {#tenant-list}

```none
php artisan tenants:list
Listing all tenants.
[Tenant] id: dbe0b330-1a6e-11e9-b4c3-354da4b4f339 @ localhost
[Tenant] id: 49670df0-1a87-11e9-b7ba-cf5353777957 @ dev.localhost
```

## Create tenant {#create-tenant}

This command lets you create tenants from the command line. You may find this useful if you need to create tenants from some service that's separate from your app.

You may specify any amount of domains using `-d <domain>`. To set data during the creation process, add arguments of the `<key>=<value>` format to the end of the call.

For example:

```none
php artisan tenants:create -d aaa.localhost -d bbb.localhost plan=free email=foo@test.local
5f6dbfb8-41da-4398-a361-5342a98d81a0
```

The command returns the created tenant's id.

## Selectively clearing tenant cache {#selectively-clearing-tenant-cache}

You can delete specific tenants' cache by using the `--tags` option on `cache:clear`:
```
php artisan cache:clear --tags=tenantdbe0b330-1a6e-11e9-b4c3-354da4b4f339
```

The tag is derived from `config('tenancy.cache.tag_base') . $id`.
