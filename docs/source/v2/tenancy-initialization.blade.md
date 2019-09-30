---
title: Tenancy Initialization
description: Tenancy Initialization..
extends: _layouts.documentation
section: content
---

# Tenancy Initialization {#tenancy-initialization}

Tenancy can be initialized using the following methods on `Stancl\Tenancy\TenantManager`:
- `initializeTenancy($tenant)`
- `initialize($tenant)`
- `init($domain)`

Similarly, tenancy can be ended using:
- `endTenancy()`
- `end()`

You can use these methods in `php artisan tinker`.

[Tenant Routes]({{ $page->link('tenant-routes') }}) have the `InitializeTenancy` middleware applied to them. That middleware automatically initializes tenancy for the current hostname.
