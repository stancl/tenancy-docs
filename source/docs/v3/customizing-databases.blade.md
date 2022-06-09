---
title: Customizing tenant databases
extends: _layouts.documentation
section: content
---

# Customizing databases {#customizing-databases}

You may customize how a tenant's DB connection is constructed by storing specific internal keys on the tenant.

If you changed the internal prefix on the tenant model, then use that instead of `tenancy_`.

## Specifying database names {#specifying-database-names}

You may specify the tenant's database name by setting the `tenancy_db_name` key when creating the tenant.

```php
Tenant::create([
    'tenancy_db_name' => 'acme',
]);
```

When you don't specify the tenant's database name, it's constructed using:

`tenancy.database.prefix` config + tenant id + `tenancy.database.suffix` config

Therefore, another way to specify database names is to set the tenant id during creation, rather than letting it be randomly generated:

```php
Tenant::create([
    'id' => 'acme',
]);
```

## Specifying database credentials {#specifying-database-credentials}

Database user & password are only created when you use the permission controlled MySQL database manager. See the database config for more info. 

You may specify the username and password for the user that will be created along with the tenant database.

```php
Tenant::create([
    'tenancy_db_username' => 'foo',
    'tenancy_db_password' => 'bar',
]);
```

The user will be given the grants specified in the `PermissionControlledMySQLDatabaseManager::$grants` array. Feel free to customize this by setting it to a different value like any other public static property.

Note that you don't want to grant the users the ability to grant themselves more grants.

## Specifying template connections {#specifying-the-template-connections}

> **Important:** there should be no `tenant` connection in `config/database.php`. If you create a template connection for tenants, name it something like `tenant_template`. The `tenant` connection is entirely managed by the package and gets reset to `null` when tenancy is ended.

To specify the connection that should be used to construct this tenant's database connection (the array like you'd find in `config/database.php`), set the `tenancy_db_connection` key. Otherwise, the connection whose name is in the `tenancy.database.template_connection` config will be used. If that key is null, the central connection will be used.

## Specifying other connection details {#specifyng-other-connection-details}

You may also set specific connection details without necessarily creating a new connection. The final "connection array" will be constructed by merging the following:

- the template connection
- the database name
- optionally, the username and password
- all `tenancy_db_*` keys

This means that you can store a value for e.g. `tenancy_db_charset` if you want to specify the charset for the tenant's database connection for whatever reason.
