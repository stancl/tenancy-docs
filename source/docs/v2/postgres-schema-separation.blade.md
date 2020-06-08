---
title: PostgreSQL schema separation
description: PostgreSQL schema separation
extends: _layouts.documentation
section: content
---

# PostgreSQL schema separation {#postgresql-schema-separation}

If you're using PostgreSQL, you can separate tenant databases by *schemas* instead of *databases*.

To enable this, set the config like this:

- `tenancy.database.separate_by`: `'schema'` to tell the package how we're separating databases
- `tenancy.database_managers.pgsql`: `Stancl\Tenancy\TenantDatabaseManagers\PostgreSQLSchemaManager::class` to tell the package to use the schema creator/deleter instead of database creator/deleter for pgsql databases.
