---
title: Migrations
extends: _layouts.documentation
section: content
---

# Migrations

Move your tenant migrations to the `database/migrations/tenant` directory. You can execute them using `php artisan tenants:migrate`.

Note that all migrations share the same PHP namespace, so even if you use the same table name in the central and tenant databases, you have to use different migration (class) names.