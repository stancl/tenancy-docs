---
title: Configuration
extends: _layouts.documentation
section: content
---

# Configuration  {#configuration}

The package is highly configurable. This page covers what you can configure in the `config/tenancy.php` file, but note that many more things are configurable. Some things can be changed by extending classes (e.g. the `Tenant` model), and **many** things can be changed using static properties. These things will *usually* be mentioned on the respective pages of the documentation, but not every time. For this reason, don't be afraid to dive into the package's source code — whenever the class you're using has a `public static` property, **it's intended to be configured**.

## Static properties {#static-properties}

You can set static properties like this (example):

```php
\Stancl\Tenancy\Middleware\InitializeTenancyByDomain::$onFail = function () {
    return redirect('https://my-central-domain.com/');
};
```

A good place to put these calls is your `app/Providers/TenancyServiceProvider`'s `boot()` method.

### Tenant model {#tenant-model}

`tenancy.tenant_model`

This config specifies what `Tenant` model should be used by the package. There's a high chance you're using a custom model, as instructed to by the [Tenants]({{ $page->link('tenants') }}) page, so be sure to change it in the config.

### Unique ID generator {#unique-id-generator}

`tenancy.id_generator`

The `Stancl\Tenancy\Database\Concerns\GeneratesIds` trait, which is applied on the default `Tenant` model, will generate a unique ID (uuid by default) if no tenant id is supplied.

If you wish to use autoincrement ids instead of uuids:

1. set this config key to null, or create a custom tenant model that doesn't use this trait
2. update the `tenants` table migration to use an incrementing column type instead of `string`
3. update the `domains` table migration `tenant_id` column to the same type as `tenants` id

### Domain model {#domain-model}

`tenancy.domain_model`

Similar to the Tenant model config. If you're using a custom model for domains, change it in this config. If you're not using domains (e.g. if you're using path or request data identification) at all, ignore this config key altogether.

### Central domains {#central-domains}

`tenancy.central_domains`

The list of domains that host your [central app]({{ $page->link('the-two-applications') }}). This is used by (among other things):

- the `PreventAccessFromCentralDomains` middleware, to prevent access from central domains to tenant routes,
- the `InitializeTenancyBySubdomain` middleware, to check whether the current hostname is a subdomain on one of your central domains.

### Bootstrappers {#bootstrappers}

`tenancy.bootstrappers`

This config array lets you enable, disable or add your own [tenancy bootstrappers]({{ $page->link('tenancy-bootstrappers') }}).

### Database {#database}

> If you're using Laravel Sail, please refer the [Laravel Sail integration guide]({{ $page->link('integrations/sail') }}).

This section is relevant to the multi-database tenancy, specifically, to the `DatabaseTenancyBootstrapper` and logic that manages tenant databases.

See this section in the config, it's documented with comments.

### Cache {#cache}

`tenancy.cache.*`

This section is relevant to cache separation, specifically, to the `CacheTenancyBootstrapper`.

Note: To use the cache separation, you need to use a cache store that supports tagging, which is usually Redis.

See this section in the config, it's documented with comments.

### Filesystem {#filesystem}

`tenancy.filesystem.*`

This section is relevant to storage separation, specifically, to the `FilesystemTenancyBootstrapper`.

See this section in the config, it's documented with comments.

### Redis {#redis}

`tenancy.redis.*`

This section is relevant to Redis data separation, specifically, to the `RedisTenancyBootstrapper`.

Note: To use this bootstrapper, you need phpredis.

See this section in the config, it's documented with comments.

### Features {#features}

`tenancy.features`

This config array lets you enable, disable or add your own [feature classes]({{ $page->link('optional-features') }}).

### Migration parameters {#migration-parameters}

`tenancy.migration_parameters`

This config array lets you set parameters used by default when running the `tenants:migrate` command (or when this command is executed using the `MigrateDatabase` job). Of course, all of these parameters can be overridden by passing them directly in the command call, be it in CLI or using `Artisan::call()`.

### Seeder parameters {#seeder-parameters}

`tenancy.seeder_parameters`

The same as migration parameters, but for `tenants:seed` and the `SeedDatabase` job.
