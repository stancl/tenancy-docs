---
title: Tenant Routes
description: Tenant routes..
extends: _layouts.documentation_v2
section: content
---

# Tenant Routes {#tenant-routes}

Routes within `routes/tenant.php` will have the `web` middleware group and the `IntializeTenancy` middleware automatically applied on them. 

The `IntializeTenancy` middleware attempts to identify the tenant based on the current hostname. Once the tenant is identified, the database connection, cache, filesystem root paths and, optionally, Redis connection, will be switched.

Just like `routes/web.php`, these routes use the `App\Http\Controllers` namespace (you can [configure this]({{ $page->link('configuration#tenant-route-namespace') }}))

> If a tenant cannot be identified, an exception will be thrown. If you want to change this behavior (to a redirect, for example) read the [Middleware Configuration]({{ $page->link('middleware-configuration') }}) page.

## Exempt routes {#exempt-routes}

Routes outside the `routes/tenant.php` file will not have the tenancy middleware automatically applied on them. You can apply this middleware manually, though.

If you want certain routes (perhaps API routes) to be multi-tenant, wrap them in a Route group with this middleware:

```php
use Stancl\Tenancy\Middleware\InitializeTenancy;

Route::middleware(InitializeTenancy::class)->group(function () {
    // Route::get('/', 'HelloWorld');
});
```

and apply the `Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains` middleware on the *entire* group:

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

The `tenancy:install` command applies this middleware to the `web` group. If you want apply it for another route group, add this middleware manually to that group. You can do this in `app/Http/Kernel.php`.
