---
title: Migrations
extends: _layouts.documentation
section: content
---

# Migrations {#migrations}

Move your tenant migrations to the `database/migrations/tenant` directory. You can execute them using `php artisan tenants:migrate`.

Note that all migrations share the same PHP namespace, so even if you use the same table name in the central and tenant databases, you have to use different migration (class) names.

If you use a modular approach to developing your project, you may have tenant migrations in multiple places. Luckily, you can specify where the package should look for tenant migrations. The `database/migrations/tenant` directory is just the default.

To set these paths, go to your `config/tenancy.php` file and change the value of the [`--paths` parameter in `migration_parameters`](https://github.com/stancl/tenancy/blob/f2a3cf028ce68e2d55c26751af0bd5a447269894/assets/config.php#L177). You may specify any number of paths in that array.
