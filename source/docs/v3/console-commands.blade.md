---
title: Console commands
extends: _layouts.documentation
section: content
---


# Console commands {#console-commands}

The package comes with some useful artisan commands.

## **Migrate** {#migrate}

The most important command. To use tenants, you have to be able to migrate their databases.

You can use the `tenants:migrate` command to migrate tenant's databases. You can also specify which tenants' databases should be migrated using the `--tenants` option.

```
php artisan tenants:migrate --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23
```

You may use multiple `--tenants=<...>` options.

> Note: By default, the migrations should be in database/migrations/tenant. If you wish to use a different path, you may use the `--path` argument.

## **Rollback & seed** {#rollback-and-seed}

- Rollback: `tenants:rollback`
- Seed: `tenants:seed`

Similarly to `migrate`, these commands accept a `--tenants` option.

## **Migrate fresh** {#migrate-fresh}

This package also offers a simplified, tenant-aware version of `migrate:fresh`. It runs `db:wipe` and `tenants:migrate` on the tenant's database.

You may use it like this:

```
php artisan tenants:migrate-fresh --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23
```

## **Run** {#run}

You can use the `tenants:run` command to run your own commands for tenants.

If your command's signature were `email:send {--queue} {--subject=} {body}`, you would run this command like this:

```
php artisan tenants:run email:send --tenants=8075a580-1cb8-11e9-8822-49c5d8f8ff23 --option="queue=1" --option="subject=New Feature" --argument="body=We have launched a new feature. ..."
```

## **Tenant list** {#tenant-list}

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

The tag is derived from `config('tenancy.cache.tag_base') . $id`.