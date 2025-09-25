---
title: Livewire integration
extends: _layouts.documentation
section: content
---

# Livewire {#livewire}

## Tenancy by domain

Open the `config/livewire.php` file and change this:

```php
'middleware_group' => ['web'],
```

to this:

```php
'middleware_group' => [
    'web',
    'universal',
    InitializeTenancyByDomain::class, // or whatever tenancy middleware you use
],
```

In Livewire 3, the configuration key `middleware_group` has been removed, so instead add the following in `TenancyServiceProvider` (or any other provider):

```php
public function boot(): void
{
    // ...

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle)
            ->middleware(
                'web',
                'universal',
                InitializeTenancyByDomain::class, // or whatever tenancy middleware you use
            );
    });
}
```

To make file uploads work on Livewire 3, set the following in any service provider:
```php
// specify the right identification middleware
FilePreviewController::$middleware = ['web', 'universal', InitializeTenancyByDomain::class];
```

And change `livewire.temporary_file_upload.middleware` to include the tenancy middleware as well:

```php
// config/livewire.php

'livewire.temporary_file_upload.middleware' => ['throttle:60,1', 'universal', InitializeTenancyByDomain::class],
```

Now you can use Livewire both in the central app and the tenant app.

Also make sure to enable [universal routes]({{ $page->link('features/universal-routes') }}).

And if you're using file uploads, read the [Real-time facades]({{ $page->link('realtime-facades') }}) page of the documentation. Livewire uses real-time facades in the uploading logic.

## Tenancy by path

Open the `config/livewire.php` file and change this:

```php
'middleware_group' => ['web'],
```

to this:

```php
'middleware_group' => [
    'web',
    InitializeTenancyByPath::class,
],
```

(Don't forget to import the middleware class.)

Open the `config/livewire.php` file and add this:

```php
use Livewire\Controllers\HttpConnectionHandler;

Route::group([
    'prefix' => '/{tenant}',
    'middleware' => [
        'web',
        InitializeTenancyByPath::class,
    ],
], function () {
    Route::post('livewire/message/{name}', [HttpConnectionHandler::class, '__invoke']);
});
```

Finally, open the blade file where the `@@livewireScripts` directive is, and add:

```html
@@livewireScripts
<script>
    window.livewire_app_url = '/{{ tenant()->id }}';
</script>
```

Now you can use Livewire both in the central app and the tenant app.
