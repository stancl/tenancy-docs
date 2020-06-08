---
title: Cached Tenant Lookup
description: Cached Tenant Lookup
extends: _layouts.documentation
section: content
---

# Cached Tenant Lookup {#cached-tenant-lookup}

If you're using the database storage driver, you may want to cache tenant lookup (domain -> tenant id -> `Tenant` object mapping). Running DB queries on each request to identify the tenant is somewhat expensive, as a separate database connection has to be established.

To avoid this, you may want to enable caching.

You may enable this feature by setting the `tenancy.storage_drivers.db.cache_store` config key to the name of your cache store (e.g. `redis`), and optionally setting `cache_ttl` (default is 3600 seconds).

The cache invalidation of course happens automatically, as long as you modify your tenants using `Tenant` objects and not direct DB calls.
