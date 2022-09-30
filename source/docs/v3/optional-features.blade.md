---
title: Optional features
extends: _layouts.documentation
section: content
---

# Optional features {#optional-features}

"Features" are classes that provide additional functionality that's not needed for the core tenancy logic. Out of the box, the package comes with these Features:

- [`UserImpersonation`]({{ $page->link('features/user-impersonation') }}) for generating impersonation tokens for users of a tenant's DB from other contexts
- [`TelescopeTags`]({{ $page->link('features/telescope-tags') }}) for adding tags with the current tenant id to Telescope entries
- [`TenantConfig`]({{ $page->link('features/tenant-config') }}) for mapping keys from the tenant storage into the application config
- [`CrossDomainRedirect`]({{ $page->link('features/cross-domain-redirect') }}) for adding a `domain()` macro on `RedirectResponse` letting you change the intended hostname of the generated route
- [`UniversalRoutes`]({{ $page->link('features/universal-routes') }}) for route actions that work in both the central & tenant context
- [`ViteBundler`]({{ $page->link('features/vite-bundler') }}) for making Vite generate the correct asset paths

All of the package's Features are in the `Stancl\Tenancy\Features` namespace.

You may register features by adding their class names to the `tenancy.features` config.
