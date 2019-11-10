---
title: Miscellaneous Tips
description: Miscellaneous Tips..
extends: _layouts.documentation
section: content
---

# Miscellaneous Tips {#misc-tips}

## Custom ID scheme

If you don't want to use UUIDs and want to use something more human-readable (even domain concatenated with uuid, for example), you can create a custom class for this:

```php
use Stancl\Tenancy\Contracts\UniqueIdentifierGenerator;

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
