---
title: Laravel Orchid integration
extends: _layouts.documentation
section: content
---

# Laravel Orchid {#laravel-orchid}

The instruction is written for a newly installed Orchid platform, it is proposed to use the platform as a central application and the tenant app.

## Both in the central app and the tenant app

Laravel Orchid has already been installed according to the [documentation Orchid](https://orchid.software/en/docs/installation/). All the steps have also been completed [Quickstart Tutorial](/docs/v3/quickstart).

- To use Orchid both in the central & tenant parts you need to enable [Universal Routes](docs/v3/features/universal-routes).
- Add the tenancy middleware to your `config\platform.php`

    ```php
    'middleware' => [
        'public'  => ['web', 'universal', \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class],
        'private' => ['web', 'platform', 'universal', \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class],
    ],
    ```

- Add a route to `routes\platform.php`

    ```php
    Route::screen('/', PlatformScreen::class)
    ->name('platform.index')
    ->breadcrumbs(function (Trail $trail) {
        return $trail->push(__('Home'), route('platform.index'));
    });
     ```

- In the file `app\Providers\RouteServiceProvider.php`, if necessary, change the path to the "home" route for your central application. By default for Orchid it will be `'admin/main'`

    ```php
    public const HOME = 'admin/main';
    ```

- Tenant Routes `routes\tenant.php`

    ```php
    Route::middleware([
        'web',
        'platform',
        InitializeTenancyByDomain::class,
        PreventAccessFromCentralDomains::class,
    ])->prefix(Orchid\Platform\Dashboard::prefix('/'))->group(function () {
        Route::get('/', function () {
            return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
        });
    });
     ```
