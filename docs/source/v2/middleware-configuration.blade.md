---
title: Middleware Configuration
description: Middleware Configuration..
extends: _layouts.documentation
section: content
---

# Middleware Configuration {#middleware-configuration}

## Header or query parameter based identification {#header-or-query-parameter-based-identification}

To identify tenants using request headers or query parameters, you may use the `InitializeTenancyByRequestData` middleware.

Create a **central** route (don't apply the `tenancy` middleware group on it and don't put it into `routes/tenant.php`) and apply this middleware on the route:

```php
\Stancl\Tenancy\Middleware\InitializeTenancyByRequestData::class
```

To customize the header, query parameter, and `onFail` logic, you may do this in your `AppServiceProvider::boot()`:

```php
// use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData::class;

$this->app->bind(InitializeTenancyByRequestData::class, function ($app) {
    return new InitializeTenancyByRequestData('header name', 'query parameter', function ($exception) {
        // return redirect()->route('foo');
    });
});
```

To disable identification using header or query parameter, set the respective parameter to `null`.

## Customizing the onFail logic {#customizing-the-onfail-logic}

When a tenant route is visited and the tenant can't be identified, an exception is thrown. If you want to change this behavior, to a redirect for example, add this to your `app/Providers/AppServiceProvider.php`'s `boot()` method:

```php
// use Stancl\Tenancy\Middleware\InitializeTenancy;

$this->app->bind(InitializeTenancy::class, function ($app) {
    return new InitializeTenancy(function ($exception) {
        // return redirect()->route('foo');
    });
});
```
