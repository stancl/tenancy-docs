---
title: Tenant Config
description: Tenant Config
extends: _layouts.documentation
section: content
---

# Tenant Config {#tenant-config}

It's likely you will need to use tenant-specific config in your application. That config could be API keys, things like "products per page" and many other things.

You could just use the [tenant storage]({{ $page->link('tenant-storage') }}) to get these values, but you may still want to use Laravel's `config()` because of:
- separation of concerns -- if you just write tenancy implementation-agnostic `config('shop.products_per_page')`, you will have a much better time changing tenancy implementations
- default values -- you may want to use the tenant storage only to override values in your config file

## Enabling the feature

Uncomment the following line in your `tenancy.features` config:
```php
// Stancl\Tenancy\Features\TenantConfig::class,
```

## Configuring the mappings

This feature maps keys in the tenant storage to config keys based on the `tenancy.storage_to_config_map` config.

For example, if your `storage_to_config_map` looked like this:
```php
'storage_to_config_map' => [
    'paypal_api_key' => 'services.paypal.api_key',
],
```

the value of `paypal_api_key` in [tenant storage]({{ $page->link('tenant-storage') }}) would be copied to the `services.paypal.api_key` config when tenancy is initialized.
