---
title: Laravel Horizon integration
extends: _layouts.documentation
section: content
---

# Laravel Horizon {#laravel-horizon}
> Note: **Horizon is used in the central app**. You can separate the jobs by [tagging them with tenant IDs](#tags).

Make sure your [queues]({{ $page->link('queues') }}) are configured correctly before using this.

## Tags {#tags}

You may add the current tenant's ID to your job tags by defining a `tags` method on the class:

```php
/**
* Get the tags that should be assigned to the job.
*
* @return array
*/
public function tags()
{
    return [
        'tenant:' . tenant('id'),
    ];
}
```
