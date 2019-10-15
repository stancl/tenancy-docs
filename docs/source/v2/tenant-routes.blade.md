---
title: Tenant Routes
description: Tenant routes..
extends: _layouts.documentation
section: content
---

# Tenant Routes {#tenant-routes}

Routes within `routes/tenant.php` will have the `web` and `tenancy` middleware groups automatically applied on them. 

Just like `routes/web.php`, these routes use the `App\Http\Controllers` namespace (you can [configure this]({{ $page->link('configuration#tenant-route-namespace') }}))

> If a tenant cannot be identified, an exception will be thrown. If you want to change this behavior (to a redirect, for example) read the [Middleware Configuration]({{ $page->link('middleware-configuration') }}) page.

## Middleware {#middleware}

The package automatically adds the `InitializeTenancy` middleware to the global middleware stack. The middleware checks if the current domain is not part of `tenancy.exempt_domains`. If not, it attempts to identify the tenant based on the current hostname. Once the tenant is identified, the database connection, cache, filesystem root paths and, optionally, Redis connection, will be switched.

After the *global* middleware is executed, the controllers are constructed. After that, the *route* middleware is executed.

All route groups in your application should have the `\Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains` middleware applied on them, to prevent access from tenant domains to central routes and vice versa.

All tenant routes in your application should have the `tenancy` middleware group applied on them.

The `tenancy` middleware group marks the route as a tenant route. That middleware functions as a "flag" for the `PreventAccessFromTenantDomains`, telling it that the route is a tenant route, since the middleware has no other way of distingushing central from tenant routes.

In previous versions, the `InitializeTenancy` middleware was applied only on tenant routes. However, that lead to tenancy not being initialized in controller constructors, which could cause bugs. So from 2.1.0 on, tenancy is initialized on all routes on non-exempt domains, and if the route is not tenant, the request gets aborted by the `PreventAccessFromTenantDomains` once Laravel reaches the route middleware step.

## Central routes {#central-routes}

Routes outside the `routes/tenant.php` file will not have the tenancy middleware automatically applied on them. You can apply this middleware manually, though.

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

**You cannot have conflicting routes in `web.php` and `tenant.php`**. It would break `php artisan route:list` and route caching.

Suggestion: Since you probably want cleaner URLs on your non-tenant part of the application (landing page, etc), prefix your tenant routes with something like `/app`.

The `Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains` middleware prevents access to non-tenant routes from tenant domains by returning a redirect to the tenant app's home page ([`tenancy.home_url`]({{ $page->link('configuration#home-url') }})). Conversely, it returns a 404 when a user attempts to visit a tenant route on a web (exempt) domain.

The `tenancy:install` command applies this middleware to the `web` and `api` groups. If you want apply it for another route group, add this middleware manually to that group. You can do this in `app/Http/Kernel.php`.
