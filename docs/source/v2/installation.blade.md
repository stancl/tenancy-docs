---
title: Installation
description: Installing stancl/tenancy
extends: _layouts.documentation
section: content
---

# Installation {#getting-started}

Laravel 6.0 or higher is needed.

### Require the package via composer

First you need to require the package using composer:

```
composer require stancl/tenancy:v2.0.0-rc1
```

> **Note:** Be sure to `composer require stancl/tenancy` (without the `:v2.0.0-rc1`) once 2.0.0 is released. <!-- todo2 -->

### Automatic installation {#automatic-installation}

To install the package, simply run

```
php artisan tenancy:install
```

This will do all the steps listed in the [Manual installation](#manual-installation) section for you.

You will be asked if you want to store your data in a relational database or Redis. Continue to the next page ([Storage Drivers]({{ $page->link('storage-drivers') }})) to know what that means.

### Manual installation {#manual-installation}

If you prefer installing the package manually, you can do that too. It shouldn't take more than a minute either way.

#### Setting up middleware

Now open `app/Http/Kernel.php` and make the package's middleware classes top priority, so that they get executed before anything else, making sure things like the database switch connections soon enough:

```php
protected $middlewarePriority = [
    \Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains::class,
    \Stancl\Tenancy\Middleware\InitializeTenancy::class,
    // ...
];
```

#### Creating routes

The package lets you have tenant routes and "exempt" routes. Tenant routes are your application's routes. Exempt routes are routes exempt from tenancy — landing pages, sign up forms, and routes for managing tenants.

Routes in `routes/web.php` are exempt, while routes in `routes/tenant.php` have the tenancy middleware automatically applied to them.

So, to create tenant routes, put those routes in a new file called `routes/tenant.php`.

#### Configuration

Run the following:

```
php artisan vendor:publish --provider='Stancl\Tenancy\TenancyServiceProvider' --tag=config
```

This creates a `config/tenancy.php`. You can use it to configure how the package works.

Configuration is explained in detail on the [Configuration]({{ $page->link('configuration') }}) page.