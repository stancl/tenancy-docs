---
title: Livewire integration
extends: _layouts.documentation
section: content
---

# Livewire

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

Now you can use Livewire both in the central app and the tenant app.

Also make sure to enable *universal routes*: