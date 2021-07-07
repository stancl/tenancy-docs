---
title: Livewire integration
extends: _layouts.documentation
section: content
---

# Livewire {#livewire}

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

(Don't forget to import the middleware class.)

Now you can use Livewire both in the central app and the tenant app.

Also make sure to enable [universal routes]({{ $page->link('features/universal-routes') }}).

And if you're using file uploads, read the [Real-time facades]({{ $page->link('realtime-facades') }}) page of the documentation. Livewire uses real-time facades in the uploading logic.
