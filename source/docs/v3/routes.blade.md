---
title: Routes
extends: _layouts.documentation
section: content
---

# Routes {#routes}

This package has a concept of central routes and tenant routes. Central routes are only available on central domains, and tenant routes are only available on tenant domains. If you don't use domain identification, then all routes are always available and you may skip the details about preventing access from other domains.

## Central routes {#central-routes}

You may register central routes in `routes/web.php` or `routes/api.php` like you're used to. However, you need to make one small change to your RouteServiceProvider.

You don't want central routes — think landing pages and sign up forms — to be accessible on tenant domains. For that reason, register them in such a way that they're **only** accessible on your central domains:

```php
// RouteServiceProvider

protected function mapWebRoutes()
{
    foreach ($this->centralDomains() as $domain) {
        Route::middleware('web')
            ->domain($domain)
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}

protected function mapApiRoutes()
{
    foreach ($this->centralDomains() as $domain) {
        Route::prefix('api')
            ->domain($domain)
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}

protected function centralDomains(): array
{
    return config('tenancy.central_domains', []);
}
```

Note: If you're using multiple central domains, you can't use route names, because different routes (= different combinations of domains & paths) can't share the same name. If you need to use a different central domain for testing, use `config()->set()` in your TestCase `setUp()`.

## Tenant routes {#tenant-routes}

You may register tenant routes in `routes/tenant.php`. These routes have no middleware applied on them, and their controller namespace is specified in `app/Providers/TenancyServiceProvider`.

By default, you will see the following setup:

```php
Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});
```

Routes within this group will have the `web` middleware group, an initialization middleware, and finally, a middleware related to the section below applied on them.

You may do the same for the `api` route group, for instance.

Also, you may use different initialization middleware than the domain one. For a full list, see the [Tenant identification]({{ $page->link('tenant-identification') }}) page.

### Conflicting paths {#conflicting-paths}

Due to the order in which the service providers (and as such, their routes) are registered, tenant routes will take precedence over central routes. So if you have a `/` route in your `routes/web.php` file but also `routes/tenant.php`, the tenant route will be used on tenant domains.

However, tenant routes that don't have their central counterpart will still be accessible on central domains and will result in a "Tenant could not be identified on domain ..." error. To avoid this, use the `Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains` middleware on all of your tenant routes. This middleware will abort with a 404 if the user is trying to visit a tenant route on a central domain.

## Universal routes [#universal-routes]

See the [Universal Routes feature]({{ $page->link('features/universal-routes') }}).
