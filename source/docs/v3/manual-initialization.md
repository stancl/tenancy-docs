---
title: Manual tenancy initialization
extends: _layouts.documentation
section: content
---

# Manual initialization

Sometimes you may want to initialize tenancy manually — that is, not using web middleware, command traits, queue tenancy etc.

For that, use the `initialize()` method on `Stancl\Tenancy\Tenancy`. You can resolve the `Tenancy` instance out of the container using the `tenancy()` helper.

```php
$tenant = Tenant::find('some-id');

tenancy()->initialize($tenant);
```