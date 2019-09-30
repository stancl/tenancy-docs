---
title: Tenant Storage
description: Tenant storage..
extends: _layouts.documentation
section: content
---

# Tenant Storage {#tenant-storage}

Tenant storage is where tenants' ids and domains are stored. You can store things like the tenant's plan, subscription information, and tenant-specific application configuration in tenant storage. You may use these functions on `Tenant` objects:
```php
get (string|array $key)
put (string|array $key, mixed $value = null) // if $key is array, make sure $value is null
```

To put something into the tenant storage, you can use `put()` or `set()`.
```php
$tenant->put($key, $value);
$tenant->set($key, $value); // alias for put()
$tenant->put(['key1' => 'value1', 'key2' => 'value2']);
```

> **Note:** Don't start any keys with `_tenancy` unless instructed to by the docs. It is a reserved namespace used to store internal data by this package.

To get something from the storage, you can use `get()`:

```php
tenant()->get($key);
tenant()->get(['key1', 'key2']);
```

> In this example, we're calling the methods on the current tenant &mdash; `tenant()`.

> Note: `get(['key1', 'key2'])` returns an associative array.

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