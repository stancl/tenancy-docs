---
title: Multi-database tenancy
extends: _layouts.documentation
section: content
---

# Multi-database tenancy {#multi-database-tenancy}

The package comes with all the tooling necessary for multi-database tenancy.

## TenantDatabaseManagers {#tenantdatabasemanagers}

TenantDatabaseManagers are classes which manage tenant databases — they primarily take care of creating and deleting them.

There are database managers for all Laravel-supported DB drivers (MySQL, PostgreSQL, SQLite). There's also a database manager for using a single database, but multiple schemas (one per tenant) with PostgreSQL.

See the `database` section of the tenancy config for more details.

## Commands {#commands}

There are also commands for working with tenant databases. Namely, `tenants:migrate` and `tenants:seed`. See the [console commands page]({{ $page->link('console-commands') }}) of the documentation.

## Jobs & Listeners {#jobs-listeners}

By default, when a tenant is created, there's also a database created for him. This is done using a JobPipeline listener in the `TenancyServiceProvider`. See the [event system page]({{ $page->link('event-system') }}) of the documentation.
