---
title: Laravel Sanctum integration
extends: _layouts.documentation
section: content
---

# Laravel Sanctum {#sanctum}

> Note: The `sanctum` auth guard can't be used with [user impersonation]({{ $page->link('features/user-impersonation') }}) because user impersonation supports stateful guards only.

Laravel Sanctum works with Tenancy out of the box, with the exception of the `sanctum.csrf-cookie` route.

### Making the csrf-cookie route work in the tenant app

To make the `sanctum.csrf-cookie` route work in the tenant app, do the following:

1. Add `'routes' => false` to the `sanctum.php` config
2. Publish the Sanctum migrations and move them to `migrations/tenant`
3. Make Sanctum not use its migrations in the central app by adding `Sanctum::ignoreMigrations()` to the `register()` method in your `AuthServiceProvider`
4. Add the following code to `routes/tenant.php` to override the original `sanctum.csrf-cookie` route:

```php
Route::group(['prefix' => config('sanctum.prefix', 'sanctum')], static function () {
    Route::get('/csrf-cookie', [CsrfCookieController::class, 'show'])
        ->middleware([
            'web',
            InitializeTenancyByDomain::class // Use tenancy initialization middleware of your choice
        ])->name('sanctum.csrf-cookie');
});
```

### Making the csrf-cookie route work both in the central and the tenant app

To use the `sanctum.csrf-cookie` route in both the central and the tenant apps:

1. Follow the steps in the previous section ("Sanctum's csrf-cookie route in the tenant app")
2. Set up [universal routes]({{ $page->link('features/universal-routes') }})
3. Remove `Sanctum::ignoreMigrations()` from your `AuthServiceProvider`'s `register()` method
4. Remove `'routes' => false` from the `sanctum.php` config
5. Add the `'universal'` middleware to the `sanctum.csrf-cookie` route in your `routes/tenant.php`
