---
title: Configuration
description: Configuring stancl/tenancy
extends: _layouts.documentation
section: content
---

# Configuration {#configuration}

The `config/tenancy.php` file lets you configure how the package behaves.

> If the `tenancy.php` file doesn't exist in your `config` directory, you can publish it by running `php artisan vendor:publish --provider='Stancl\Tenancy\TenancyServiceProvider' --tag=config`

### `storage_driver, storage` {#storage}

This lets you configure the driver for tenant storage, i.e. what will be used to store information about your tenants. You can read more about this on the [Storage Drivers]({{ $page->link('storage-drivers') }}) page.

Available storage drivers:
- `Stancl\Tenancy\StorageDrivers\RedisStorageDriver`
- `Stancl\Tenancy\StorageDrivers\Database\DatabaseStorageDriver`

#### db {#db-storage-driver}

- `data_column` - the name of column that holds the tenant's data in a single JSON string
- `custom_columns` - list of keys that shouldn't be put into the data column, but into their own column
- `connection` - what database connection should be used to store tenant data (`null` means the default connection)
- `table_names` - the table names used by the models that come with the storage driver

> Note: Don't use the models directly. You're supposed to use [storage]({{ $page->link('tenant-storage') }}) methods on `Tenant` objects.

#### redis {#redis-db-driver}

- `connection` - what Redis connection should be used to store tenant data. See the [Storage Drivers]({{ $page->link('storage-drivers') }}) documentation.

### `tenant_route_namespace` {#tenant-route-namespace}

Controller namespace used for routes in `routes/tenant.php`. The default value is the same as the namespace for `web.php` routes.

### `exempt_domains` {#exempt-domains}

If a hostname from this array is visited, the `tenant.php` routes won't be registered, letting you use the same routes as in that file. This should be the domain without the protocol (i.e., `example.com` rather than `https://example.com`).

### `database` {#database}

The application's default connection will be switched to a new one — `tenant`. This connection will be based on the connection specified in `tenancy.database.based_on`. The database name will be `tenancy.database.prefix + tenant id + tenancy.database.suffix`.

You can set the suffix to `.sqlite` if you're using sqlite and want the files to be with the `.sqlite` extension. Conversely, you can leave the suffix empty if you're using MySQL, for example.

### `redis` {#redis}

If the `RedisTenancyBootstrapper` is enabled (see `bootstrappers` below), any connections listed in `tenancy.redis.prefixed_connections` will be prefixed with `config('tenancy.redis.prefix_base') . $id`.

> Note: You need phpredis. Predis support will dropped by Laravel in version 7.

### `cache` {#cache}

The `CacheManager` instance that's resolved when you use the `Cache` or the `cache()` helper will be replaced by `Stancl\Tenancy\CacheManager`. This class automatically uses [tags](https://laravel.com/docs/master/cache#cache-tags). The tag will look like `config('tenancy.cache.tag_base') . $id`.

### `filesystem` {#filesystem}

The `storage_path()` will be suffixed with a directory named `config('tenancy.filesystem.suffix_base') . $id`.

The root of each disk listed in `tenancy.filesystem.disks` will be suffixed with `config('tenancy.filesystem.suffix_base') . $id`.

For disks listed in `root_override`, the root will be that string with `%storage_path%` replaced by `storage_path()` *after* tenancy has been initialized. All other disks will be simply suffixed with `tenancy.filesystem.suffix_base` + the tenant id.

Read more about this on the [Filesystem Tenancy]({{ $page->link('filesystem-tenancy') }}) page.

### `database_managers` {#database_managers}

Tenant database managers handle the creation & deletion of tenant databases. This configuration array maps the database driver name to the `TenantDatabaseManager`, e.g.:

```php
'mysql' => Stancl\Tenancy\TenantDatabaseManagers\MySQLDatabaseManager::class
```

### `database_manager_connections` {#database_maanger_connections}

Connections used by TenantDatabaseManagers. They tell, for example, that the manager for the `mysql` driver (`MySQLDatabaseManager`) should use the `mysql` connection. You may want to change this if your connection is named differently, e.g. a MySQL connection named `central`.

### `bootstrappers` {#bootstrappers}

These are the classes that do the magic. When tenancy is initialized, TenancyBootstrappers are executed, making Laravel tenant-aware.

This config is an array. The key is the alias and the value is the full class name.

```php
'cache' => Stancl\Tenancy\TenancyBootstrappers\CacheTenancyBootstrapper::class,
```

The aliases are used by the [event system]({{ $page->link('hooks') }})

### `features` {#bootstrappers}

[Features]({{ $page->link('optional-features') }}) are similar to bootstrappers, but they are executed regardless of whether tenancy has been initialized or not. Their purpose is to provide additional functionality beyond what is necessary for the package to work. Things like easy redirects to tenant domains, tags in Telescope, etc.

### `home_url` {#home-url}

When a user tries to visit a non-tenant route on a tenant domain, the `PreventAccessFromTenantDomains` middleware will return a redirect to this url.

### `queue_database_creation` {#queue-database-creation}

- Default: `false`

### `migrate_after_creation` {#migrate-after-creation}

Run migrations after creating a tenant.

- Default: `false`

### `seed_after_migration` {#seed-after-migration}

Run seeds after creating a tenant.

- Default: `false`

### `seeder_parameters` {#seeder_parameters}

Parameters passed to the `tenants:seed` command.

- Default: `['--class' => 'DatabaseSeeder']`

### `delete_database_after_tenant_deletion` {#delete-database-after-tenant-deletion}

Delete the tenant's database after deleting the tenant.

- Default: `false`

### `queue_database_deletion` {#queue-database-deletion}

- Default: `false`

### `unique_id_generator` {#unique-id-generator}

The class used to generate a random tenant ID (when no ID is supplied during the tenant creation process).

- Default: `Stancl\Tenancy\UUIDGenerator`
