---
title: Tenant Routes
description: Tenant Routes
extends: _layouts.documentation
section: content
---

# Tenant Routes {#tenant-routes}

Routes within `routes/tenant.php` will have the `web` and `tenancy` middleware groups automatically applied on them. 

Just like `routes/web.php`, these routes use the `App\Http\Controllers` namespace (you can [configure this]({{ $page->link('configuration#tenant-route-namespace') }}))

> If a tenant cannot be identified, an exception will be thrown. If you want to change this behavior (to a redirect, for example) read the [Middleware Configuration]({{ $page->link('middleware-configuration') }}) page.

## Middleware {#middleware}

The package automatically adds the `InitializeTenancy` middleware to the global middleware stack. This middleware checks if the current domain is not part of `tenancy.exempt_domains`. If not, it attempts to identify the tenant based on the current hostname. Once the tenant is identified, the database connection, cache, filesystem root paths and, optionally, Redis connection, will be switched.

After the *global* middleware is executed, the controllers are constructed. 

After that, the *route* middleware is executed.

All route groups in your application should have the `\Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains` middleware applied on them, to prevent access from tenant domains to central routes and vice versa. See below for more detail about the `PreventAccessFromTenantDomains` middleware.

All tenant routes in your application should have the `tenancy` middleware group applied on them.

The `tenancy` middleware group marks the route as a tenant route. That middleware functions as a "flag" for the `PreventAccessFromTenantDomains`, telling it that the route is a tenant route, since the middleware has no other way of distingushing central from tenant routes.

In previous versions, the `InitializeTenancy` middleware was applied only on tenant routes. However, that lead to tenancy not being initialized in controller constructors, which could cause bugs. So from 2.1.0 on, tenancy is initialized on all routes on non-exempt domains, and if the route is not tenant, the request gets aborted by the `PreventAccessFromTenantDomains` once Laravel reaches the route middleware step.

## Central routes {#central-routes}

Routes in files other than `routes/tenant.php` will not have the `tenancy` middleware automatically applied on them, so they will be central routes. If you want these routes to be tenant routes, you can apply the `tenancy` middleware manually, as described in custom route groups below.

## API routes / custom route groups {#custom-groups}

If you want certain routes (perhaps API routes) to be multi-tenant, wrap them in a Route group with this middleware:

```php
Route::middleware('tenancy')->group(function () {
    // Route::get('/', 'HelloWorld');
});
```

and make sure the `Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains` middleware is applied on the *entire* group:

```php
// app/Http/Kernel.php
protected $middlewareGroups = [
    // ...
    'api' => [
        \Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains::class,
        // ...
    ]
];
```

## The `PreventAccess...` middleware {#prevent-access-middleware}

The `Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains` middleware prevents access to non-tenant routes from tenant domains by returning a redirect to the tenant app's home page ([`tenancy.home_url`]({{ $page->link('configuration#home-url') }})). Conversely, it returns a 404 when a user attempts to visit a tenant route on a web (exempt) domain.

The `tenancy:install` command applies this middleware to the `web` and `api` groups. To apply it for another route group, add this middleware manually to that group. You can do this in `app/Http/Kernel.php`.

## Conflicting routes {#conflicting-routes}

By default, you cannot have conflicting routes in `web.php` and `tenant.php`. It would break `php artisan route:list` and route caching.

**However**, tenant routes are loaded after the web/api routes, so if you register your central routes only for domains listed in the `tenancy.exempt_domains` config, you **can use the same URLs for central and tenant routes**.

Here's an example implementation:
```php
// RouteServiceProvider

protected function mapWebRoutes()
{
    foreach (config('tenancy.exempt_domains', []) as $domain) {
        Route::middleware('web')
            ->domain($domain)
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}

protected function mapApiRoutes()
{
    foreach (config('tenancy.exempt_domains', []) as $domain) {
        Route::prefix('api')
            ->middleware('api')
            ->domain($domain)
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
```

One thing to keep in mind though: If you use multiple exempt domains, you cannot use route names. They can be used only once, so the name would link to the URL on the first exempt domain.

If you don't need conflicting routes, you may want to do the following: Since you probably want cleaner URLs on your non-tenant part of the application (landing page, etc), prefix your tenant routes with something like `/app`.
