---
title: Integration with Spatie packages
description: Integration with Spatie packages
extends: _layouts.documentation
section: content
---

# Integration with Spatie packages {#integration-with-spatie-packages}

## laravel-activitylog {#activitylog}

### For the tenant app: {#activitylog-tenant}
- Set the `database_connection` key in `config/activitylog.php` to `null`. This makes activitylog use the default connection.
- Publish the migrations and move them to `database/migrations/tenant`. (And, of course, don't forget to run `artisan tenants:migrate`.)

### For the central app: {#activitylog-central}
- Set the `database_connection` key in `config/activitylog.php` to the name of your central database connection.
