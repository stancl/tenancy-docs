---
title: Manual tenancy mode
extends: _layouts.documentation
section: content
---


# Manual mode {#manual-mode}

> See: [Automatic mode]({{ $page->link('automatic-mode') }})

If you wish to use the package only to keep track of the current tenant and make the application tenant-aware manually — without the use [Tenancy bootstrappers]({{ $page->link('tenancy-bootstrappers') }}), you can absolutely do that.

You may use the `Stancl\Tenancy\Database\Concerns\CentralConnection` and `Stancl\Tenancy\Database\Concerns\TenantConnection` model traits to make models explicitly use the given connections.

To create the tenant connection, set up the `CreateTenantConnection` listener:

```php
// app/Providers/TenancyServiceProvider.php

Events\TenancyInitialized::class => [
    Listeners\CreateTenantConnection::class,
],
```

This approach is generally discouraged, because you lose all of the benefits of the [automatic mode]({{ $page->link('automatic-mode') }}), but **there won't be any issues with the package** if you decide to use the manual mode. You might not be able to integrate other packages as easily, but if for whatever reason it makes more sense for your project to use this approach, feel comfortable to do so.

