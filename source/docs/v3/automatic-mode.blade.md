---
title: Automatic tenancy mode
extends: _layouts.documentation
section: content
---

# Automatic mode {#automatic-mode}

By default, the package bootstraps tenancy automatically in the background. This means that when a tenant is identified (usually using middleware), the default database/cache/filesystem/etc is switched to that tenant's context. You can read more about this on the [Tenancy bootstrappers]({{ $page->link('tenancy-bootstrappers') }}) page.

The flow goes like this:

`TenancyInitialized` fired → `BootstrapTenancy` listens → executes tenancy bootstrappers

It's recommended to use this mode, because:

- Separation of concerns. Tenancy happens one layer below your application. If you need to change the details of how tenancy is bootstrapped, you can do that without having to change a ton of your app code.
- You don't have to think about the internals of how tenancy works when writing your application code. When you're writing the tenant part of the application, you're simply writing e.g. an e-commerce application, not a multi-tenant e-commerce application. No need to think about database connections when writing validation rules.
- Great integration with other packages. Switching the default database connection (and other things) is the only way to integrate many packages into the tenant part of the application. For example, you can use Laravel Nova to manage resources inside the tenant application.
