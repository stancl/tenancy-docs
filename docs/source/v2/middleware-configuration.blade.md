---
title: Middleware Configuration
description: Middleware Configuration..
extends: _layouts.documentation
section: content
---

# Middleware Configuration {#middleware-configuration}

When a tenant route is visited and the tenant can't be identified, an exception is thrown. If you want to change this behavior, to a redirect for example, add this to your `app/Providers/AppServiceProvider.php`'s `boot()` method:

```php
// use Stancl\Tenancy\Middleware\InitializeTenancy;

$this->app->bind(InitializeTenancy::class, function ($app) {
    return new InitializeTenancy(function ($exception) {
        // return redirect()->route('foo');
    });
});
```