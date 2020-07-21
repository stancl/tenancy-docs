---
title: Tenant-specific config
extends: _layouts.documentation
section: content
---

# Tenant config {#tenant-config}

It's likely you will need to use tenant-specific config in your application. That config could be API keys, things like "products per page" and many other things.

You could just use the the tenant model to get these values, but you may still want to use Laravel's `config()` because of:

- separation of concerns — if you just write tenancy implementation-agnostic `config('shop.products_per_page')`, you will have a much better time changing tenancy implementations
- default values — you may want to use the tenant storage only to override values in your config file

## **Enabling the feature** {#enabling-the-feature}

Uncomment the following line in your `tenancy.features` config:

```php
// Stancl\Tenancy\Features\TenantConfig::class,
```

## **Configuring the mappings** {#configuring-the-mappings}

This feature maps keys in the tenant storage to config keys based on the `$storageToConfigMap` public property.

For example, if your `$storageToConfigMap` looked like this:

```php
\Stancl\Tenancy\Features\TenantConfig::$storageToConfigMap = [
    'paypal_api_key' => 'services.paypal.api_key',
],
```

the value of `paypal_api_key` in tenant model would be copied to the `services.paypal.api_key` config when tenancy is initialized.

## Mapping the value to multiple config keys {#mapping-the-value-to-multiple-config-keys}

Sometimes you may want to copy the value to multiple config keys. To do that, specify the config keys as an array:

```php
\Stancl\Tenancy\Features\TenantConfig::$storageToConfigMap = [
    'locale' => [
        'app.locale',
        'locales.default',
    ],
],
```