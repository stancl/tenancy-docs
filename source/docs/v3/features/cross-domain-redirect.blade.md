---
title: Cross-domain redirect
extends: _layouts.documentation
section: content
---

# Cross-domain redirect {#cross-domain-redirect}

To enable this feature, uncomment the `Stancl\Tenancy\Features\CrossDomainRedirect::class` line in your `tenancy.features` config.

Sometimes you may want to redirect the user to a specific route on a different domain (than the current one). Let's say you want to redirect a tenant to the `home` path on their domain after they sign up:

```php
return redirect()->route('home')->domain($domain);
```

You can also use the `tenant_route()` helper to redirect users between domains. Which also works when redirecting the user from the central domain to the tenant domain.

```php
return redirect(tenant_route($domain, 'home'));
```
