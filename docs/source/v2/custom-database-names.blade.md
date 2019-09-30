---
title: Custom Database Names
description: Custom Database Names..
extends: _layouts.documentation
section: content
---

# Custom Database Names {#custom-database-names}

To set the a database name for a tenant, use set `_tenancy_db_name` key in the tenant's storage.

You should do this during the tenant creation process, to make sure the database is created with the right name:

```php
use Stancl\Tenancy\Tenant;

Tenant::create('example.com', [
    '_tenancy_db_name' => 'example_com'
])
```