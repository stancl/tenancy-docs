---
title: Difference Between This Package And Others
description: Difference Between This Package And Others
extends: _layouts.documentation_v2
section: content
---

# Difference Between This Package And Others

A frequently asked question is the difference between this package and [tenancy/multi-tenant](https://github.com/tenancy/multi-tenant).

Packages like tenancy/multi-tenant and tenancy/tenancy give you an API for making your application multi-tenant. They give you a tenant DB connection, traits to apply on your models, a guide on creating your own tenant-aware cache, etc.

This package (stancl/tenancy) makes your application multi-tenant automatically and attempts to make you not have to change any things in your code. The philosophy behind this approach is that you should write your app, not tenancy boilerplate.

Apart from saving you a ton of time, the benefit of going with the automatic approach (stancl/tenancy) is that you can adapt easily, since you're not bound to a specific implementation of multi-tenancy. [You can always change how tenancy is bootstrapped.]({{ $page->link('tenancy-bootstrappers') }})

## Which one should you use?

Depends on what you prefer.

If you want full control and make your application multi-tenant yourself, use tenancy/multi-tenant.

If you want to focus on writing your application instead of tenancy implementations, use stancl/tenancy.
