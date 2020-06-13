---
title: Universal routes
extends: _layouts.documentation
section: content
---

# Universal Routes

> Note: If you need custom [onFail]({{ $page->link('tenant-identification') }}) logic, you cannot use this feature as it will override any of your changes to that logic. Instead, look into the source code of this feature and make your onFail logic implement universal routes too.

Sometimes, you may want to use the exact same **route action** both in the central application and the tenant application. Note the emphasis on route **action** — you may use the same **path** with different actions in central & tenant routes, whereas this section covers using the same **route and action**.

Generally, try to avoid these use cases as much as possible and prefer duplicating the code. Using the same controller and model for users in central & tenant apps will break down once you need slightly different behavior — e.g. different views returned by controllers, different behavior on models, etc.

First, enable the `UniversalRoutes` feature by uncommenting the following line in your `tenancy.features` config:

```php
Stancl\Tenancy\Features\UniversalRoutes::class,
```

Next, go to your `app/Http/Kernel.php` file and add the following middleware group:

```php
'universal' => [],
```

We will use this middleware group as a "flag" on the route, to mark it as a universal route. We don't need any actual middleware inside the group.

Then, create a route like this:

```php
Route::get('/foo', function () {
    // ...
})->middleware(['universal', InitializeTenancyByDomain::class]);
```

And the route will work in both central and tenant applications. Should a tenant be found, tenancy will be initialized. Otherwise, the central context will be used.

If you're using a different middleware, look at the `UniversalRoutes` feature source code and change the public static property accordingly.