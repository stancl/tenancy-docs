---
title: Tenant Storage
description: Tenant storage..
extends: _layouts.documentation_v2
section: content
---

# Tenant Storage {#tenant-storage}

Tenant storage is where tenants' ids and domains are stored. You can store things like the tenant's plan, subscription information, and tenant-specific application configuration in tenant storage. You can use these functions:
```php
get (string|array $key, string $id = null) // $id defaults to the current tenant's id
put (string|array $key, mixed $value = null, string $id = null) // if $key is array, make sure $value is null
```

To put something into the tenant storage, you can use `put()` or `set()`.
```php
tenancy()->put($key, $value);
tenancy()->set($key, $value); // alias for put()
tenancy()->put($key, $value, $id);
tenancy()->put(['key1' => 'value1', 'key2' => 'value2']);
tenancy()->put(['key1' => 'value1', 'key2' => 'value2'], null, $id);
```

To get something from the storage, you can use `get()`:

```php
tenancy()->get($key);
tenancy()->get($key, $id);
tenancy()->get(['key1', 'key2']);
```

> Note: `tenancy()->get(['key1', 'key2'])` returns an array with values only

Note that $key has to be a string or an array with string keys. The value(s) can be of any data type. Example with arrays:

```php
>>> tenant()->put('foo', ['a' => 'b', 'c' => 'd']);
=> [ // put() returns the supplied value(s)
     "a" => "b",
     "c" => "d",
   ]
>>> tenant()->get('foo');
=> [
     "a" => "b",
     "c" => "d",
   ]
```