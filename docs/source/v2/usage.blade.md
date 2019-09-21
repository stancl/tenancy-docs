---
title: Usage
description: Usage..
extends: _layouts.documentation_v2
section: content
---

# Usage {#usage}

This chapter describes usage of the package. That includes creating tenants, deleting tenants, storing data in the tenant storage.

This package comes with two helpers - `tenancy()` and `tenant()`. `tenancy()` returns an instance of `TenantManager` and should be primarily used only for `tenancy()->all()`, but for legacy reasons it can be used to create tenants.

You can pass an argument to the helper function to get a value out of the tenant storage. `tenant('plan')` is identical to [`tenant()->get('plan')`]({{ $page->link('tenant-storage') }}).

The package also comes with two facades. `Tenancy` -- for `TenantManager` -- and `Tenant` -- for the current `Tenant`, or null if no tenant has been identified yet.
