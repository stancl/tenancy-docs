---
title: Cached tenant lookup
extends: _layouts.documentation
section: content
---

# Cached lookup {#cached-lookup}

If you're using multiple databases, you may want to avoid making a query to the central database on **each tenant request** — for tenant identification. Even though the queries are very simple, the app has to establish a connection with the central database which is expensive.

To avoid this, you may enable caching on the tenant resolvers (all in the `Stancl\Tenancy\Resolvers` namespace):

- `DomainTenantResolver` (also used for subdomain identification)
- `PathTenantResolver`
- `RequestDataTenantResolver`

On each of these classes, you may set the following static properties:

```php
// TenancyServiceProvider::boot()

use Stancl\Tenancy\Resolvers;

 // enable cache
DomainTenantResolver::$shouldCache = true;

// seconds, 3600 is the default value
DomainTenantResolver::$cacheTTL = 3600;

// specify some cache store
// null resolves to the default cache store
DomainTenantResolver::$cacheStore = 'redis';
```