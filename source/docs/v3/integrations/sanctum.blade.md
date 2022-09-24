---
title: Laravel Sanctum integration
extends: _layouts.documentation
section: content
---

# Laravel Sanctum {#sanctum}

> Note that the `sanctum` auth guard can't be used with [user impersonation]({{ $page->link('features/user-impersonation') }}) because user impersonation supports stateful guards only.

If you need to use the `csrf-cookie` route that Sanctum provides, you have to set up [universal routes]({{ $page->link('features/universal-routes') }}) in your app. Then, add `'routes' => false` to the `sanctum.php` config.

Finally, add the following code to `routes/tenant.php` (use tenancy initialization middleware of your choice):

```php
Route::group(['prefix' => config('sanctum.prefix', 'sanctum')], static function () {
    Route::get('/csrf-cookie',[\Laravel\Sanctum\Http\Controllers\CsrfCookieController::class, 'show'])
        // Use tenancy initialization middleware of your choice
        ->middleware(['universal', 'web', \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class])
        ->name('sanctum.csrf-cookie');
});
```
