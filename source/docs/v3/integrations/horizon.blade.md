---
title: Laravel Horizon integration
extends: _layouts.documentation
section: content
---

# Laravel Horizon

Make sure your [queues]({{ $page->link('queues') }}) are configured correctly before using this.

You may add the current tenant's id to your job tags:

```php
public function tags()
{
    return [
        'tenant' => tenant('id'),
    ];
}
```