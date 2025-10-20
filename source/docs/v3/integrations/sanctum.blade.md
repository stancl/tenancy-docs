---
title: Laravel Sanctum integration
extends: _layouts.documentation
section: content
---

# Laravel Sanctum {#sanctum}

> Note: The `sanctum` auth guard can't be used with [user impersonation]({{ $page->link('features/user-impersonation') }}) because user impersonation supports stateful guards only.

Laravel Sanctum works with Tenancy out of the box, with the exception of the `sanctum.csrf-cookie` route. You can make some small changes to make the route work.

### Making the csrf-cookie route work in the tenant app {#csrf-cookie-route-in-tenant-app}

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

### Making the csrf-cookie route work both in the central and the tenant app {#csrf-cookie-route-in-both-apps}

To use the `sanctum.csrf-cookie` route in both the central and the tenant apps:

1. Follow the steps in the previous section ("Sanctum's csrf-cookie route in the tenant app")
2. Set up [universal routes]({{ $page->link('features/universal-routes') }})
3. Remove `Sanctum::ignoreMigrations()` from your `AuthServiceProvider`'s `register()` method
4. Remove `'routes' => false` from the `sanctum.php` config
5. Add the `'universal'` middleware to the `sanctum.csrf-cookie` route in your `routes/tenant.php`

### Sanctum API Token Integration with Laravel 12 {#sanctum-api-token-integration-laravel-12}

When integrating **Laravel Sanctum’s API token authentication** with **Tenancy for Laravel** in **Laravel 12**, you may encounter an issue where:

```php
$request->user(); // returns null
```
even though you have correctly applied the auth:sanctum middleware.

This happens because, in Laravel 12, middleware registration is handled via the new bootstrap/app.php file, and the tenancy initialization middleware must run before Sanctum’s authentication middleware in the API middleware stack.

To resolve this, update your bootstrap/app.php as follows:
```php
use App\Http\Middleware\InitializeTenancyBySubDomain;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web([]);

        // 👇 Important: Prepend tenancy middleware before Sanctum runs
        $middleware->api(prepend: [
            InitializeTenancyBySubDomain::class,
        ]);
    })
    ->create();
```

With this change, the tenancy context initializes before Sanctum authenticates the user, allowing $request->user() to resolve correctly to the authenticated tenant user.

Note: In earlier Laravel versions (≤11), middleware order was managed in app/Http/Kernel.php.
Since Laravel 12 replaces that with bootstrap/app.php, explicit ordering via withMiddleware() is now required.

