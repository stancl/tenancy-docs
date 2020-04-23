---
title: Disabling Database Creation
description: Disabling Database Creation
extends: _layouts.documentation
section: content
---

# Disabling Database Creation {#disabling-database-creation}

DB creation can be disabled for all tenants (`tenancy.create_database` config), or for individual tenants during tenant creation:

```php
Tenant::new()->withData([
    '_tenancy_create_database' => false,
])->save();
```
