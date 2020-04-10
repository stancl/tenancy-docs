---
title: Livewire Integration
description: Livewire Integration
extends: _layouts.documentation
section: content
---

# Livewire Integration {#livewire-integration}

Open the `config/livewire.php` file and change this line:

```php
'middleware_group' => ['web'],
```

to this:
```php
'middleware_group' => ['web', 'universal'],
```

Now you can use Livewire both in the central app and the tenant app.
