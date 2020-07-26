---
title: Domains
extends: _layouts.documentation
section: content
---

# Domains {#domains}

Note: Domains are optional. If you're using path or request data identification, you don't need to worry about them.

To add a domain to a tenant, use the `domains` relationship:

```php
$tenant->domains()->create([
    'domain' => 'acme',
]);
```

If you use the subdomain identification middleware, the example above will work for `acme.{any of your central domains}`. If you use the domain identification middleware, use the full hostname like `acme.com`. If you use the combined domain/subdomain identification middleware, `acme` will work as a subdomain and `acme.com` will work as a domain.

To retrieve the current domain model (when using domain identification), you may access the `$currentDomain` public static property on `DomainTenantResolver`.

## Local development {#local-development}

For local development, you may use `*.localhost` domains (like `foo.localhost`) for tenants. On many operating systems, these work the same way as `localhost`.

If you're using Valet, you may want to use e.g. `saas.test` for the central domain and `foo.saas.test`, `bar.saas.test` etc for tenant domains.
