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

If you use the subdomain identification middleware, the example above will work for `acme.{any of your central domains}`. If you use the domain identification middleware, use the full hostname like `acme.com`. If you use the combined domain/subdomain identification middleware, you should use both `acme` as a subdomain and `acme.com` for the domain.

Note that starting with Laravel 8 and up, Laravel TrustHost middleware is enabled by default (see [laravel/laravel#5477](https://github.com/laravel/laravel/pull/5477)). This blocks Domain-based tenant identification since these requests will be treated as 'untrusted' unless added as a trusted host. You can either comment out this middleware in your App\Http\Kernel.php, or you can adding the custom tenant domains in the App\Http\Middleware\TrustHosts.php `hosts()` method.

To retrieve the current domain model (when using domain identification), you may access the `$currentDomain` public static property on `DomainTenantResolver`.

## Local development {#local-development}

For local development, you may use `*.localhost` domains (like `foo.localhost`) for tenants. On many operating systems, these work the same way as `localhost`.

If you're using Valet, you may want to use e.g. `saas.test` for the central domain and `foo.saas.test`, `bar.saas.test` etc for tenant domains.
