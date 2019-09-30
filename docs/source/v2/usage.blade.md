---
title: Usage
description: Usage..
extends: _layouts.documentation
section: content
---

# Usage {#usage}

This chapter describes usage of the package. That includes creating tenants, deleting tenants, storing data in the tenant storage.

The package comes with two helpers - `tenancy()` and `tenant()`.
- `tenancy()` returns an instance of [`TenantManager`]({{ $page->link('tenant-manager') }})
- `tenant()` returns an instance of the current tenant, or null if no tenant hs been identified yet. You can pass an argument to this helper, to get a value from the tenant storage: `tenant('plan')` is identical to [`tenant()->get('plan')`]({{ $page->link('tenant-storage') }}).

The package also comes with two facades. `Tenancy` -- for `TenantManager` -- and `Tenant` -- for the current `Tenant`.
