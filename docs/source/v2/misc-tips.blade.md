---
title: Miscellaneous Tips
description: Miscellaneous Tips..
extends: _layouts.documentation
section: content
---

# Miscellaneous Tips {#misc-tips}

## Tenant Redirect {#tenant-redirect}

> To enable this feature, uncomment the `Stancl\Tenancy\Features\TenantRedirect::class` line in your `tenancy.features` config.

A customer has signed up on your website, you have created a new tenant and now you want to redirect the customer to their website. You can use the `tenant()` method on Redirect, like this:

```php
// tenant sign up controller
return redirect()->route('dashboard')->tenant($domain);
```

## Custom ID scheme

If you don't want to use UUIDs and want to use something more human-readable (even domain concatenated with uuid, for example), you can create a custom class for this:

```php
use Stancl\Tenancy\Interfaces\UniqueIdentifierGenerator;

class MyUniqueIDGenerator implements UniqueIdentifierGenerator
{
    public static function handle(string $domain, array $data): string
    {
        return $domain . \Ramsey\Uuid\Uuid::uuid4()->toString();
    }
}
```

and then set the `tenancy.unique_id_generator` config to the full path to your class.

Note that you may have to make the `id` column on the `tenants` table larger, as it's set to the exact length of uuids by default.
