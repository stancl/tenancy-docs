---
title: Laravel Orchid integration
extends: _layouts.documentation
section: content
---

# Laravel Orchid {#laravel-orchid}

First, set up tenancy following the [quickstart guide]({{ $page->link('quickstart') }}), and install [Laravel Orchid](https://orchid.software/en/docs/installation/).

To use Orchid both in the central and the tenant app:

– Copy the user and Orchid migrations to `migrations\tenant`

- Enable [universal routes]({{ $page->link('features/universal-routes') }})

- Add your tenant identification middleware to `config\platform.php` (feel free to use a different identification middleware):

    ```php
    'middleware' => [
        'public'  => ['web', 'universal', InitializeTenancyByDomain::class], // Don't forget to import the middleware
        'private' => ['web', 'platform', 'universal', InitializeTenancyByDomain::class],
    ],
    ```

- Add a route to `routes\platform.php`:

    ```php
    Route::screen('/', PlatformScreen::class)
        ->name('platform.index')
        ->breadcrumbs(function (Trail $trail) {
            return $trail->push(__('Home'), route('platform.index'));
        });
    ```

- Add 'platform' middleware to your tenant routes (`routes\tenant.php`):

    ```php
    Route::middleware([
        'web',
        'platform',
        InitializeTenancyByDomain::class,
        PreventAccessFromCentralDomains::class,
    ]);
    ```

- If listing users in the admin panel throws an exception, change line 55 in the UserListLayout class to `return $user->updated_at?->toDateTimeString()` (add null-safe operator)
