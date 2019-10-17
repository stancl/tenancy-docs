---
title: Tenants
description: Tenants
extends: _layouts.documentation
section: content
---

# Tenants {#tenants}

This page covers the `Stancl\Tenancy\Tenant` object. Both [creating tenants]({{ $page->link('creating-tenants') }}) and interacting with the [tenant storage]({{ $page->link('tenant-storage') }}) are covered on separate pages. This page focuses on advanced usage, which can help you with writing nicer code.

## `$data` {#data}

An associative array that mirrors the tenant's data in the actual storage. It acts as a "cache" for [tenant storage methods]({{ $page->link('tenant-storage') }}). When you call `$tenant->get('foo')`, the `$data` property is checked for `'foo'` before trying to read from the storage. Similarly, when you call `$tenant->put()`, you write both to the actual storage and to the `$data` array.

If you try to access the tenant's properties using `$tenant->foo` or `$tenant['foo']`, those calls are redirected to the `$data` array.

The `put()` call always writes to the actual storage. If you do just:
```php
$tenant->foo = 'bar';
```
The data will not be persisted until you `->save()` the `$tenant`.

## `$domains` {#domains}

An array of domains that belong to the tenant.

You may add and remove domains using the following methods:

```php
$tenant->addDomains(['foo.yourapp.com'])->save();
$tenant->addDomains('foo.yourapp.com')->save();
$tenant->removeDomains(['foo.yourapp.com'])->save();
$tenant->removeDomains('foo.yourapp.com')->save();
```

> Don't forget to `->save()` after modifying the domains!

## `run()` {#run}

The `$tenant->run()` command lets you execute a closure inside a tenant's "environment".
```php
$tenant->run(function ($tenant) {
    User::create(['name' => 'Admin', 'email' => 'admin@yourapp.com', ...]);
});
```

It also lets you get data from the tenant's environment:
```php
$tenantsUserCount = $tenant->run(function ($tenant) {
    return User::count();
});
```

If you need access to the tenant within the closure, it's passed as the first argument.

This feature is a safe alternative to:
```php
tenancy()->initialize($tenant);

// make some changes

tenancy()->end();
```

and it also checks if tenancy was initialized. If it was, it returns to the original tenant after running the closure.

## `$persisted` {#persisted}

This property says whether the model has saved to the storage yet. In other words, if it's `false`, it's a new instance that has not been `->save()`d yet.

## `->save()` {#save}

If no ID is set in the tenant's `$data`, it will be generated using the `UniqueIDGenerator` specified in `config('tenancy.unique_id_generator')`.

Then, if the object has been persisted, it's updated in storage. Otherwise, it's written to storage.

## `->with()` {#with}

You may fluently change the tenant's `$data` using `->with()`:
```php
$tenant->with('foo', 'bar'); // equivalent to $tenant->foo = $bar
```

Don't forget to `->save()` when you use `->with()`:
```php
$tenant->with('foo', 'bar')->with('abc', 'xyz')->save();
```

You may also use `->with<PropertyNameInPascalCase>` and it will be stored in snake case:
```php
>>> \Tenancy::find('b07aa3b0-dc68-11e9-9352-9159b2055c42')
=> Stancl\Tenancy\Tenant {#3060
     +data: [
       "id" => "b07aa3b0-dc68-11e9-9352-9159b2055c42",
     ],
     +domains: [
       "foo.localhost",
     ],
   }
>>> \Tenancy::find('b07aa3b0-dc68-11e9-9352-9159b2055c42')
    ->withPaypalApiKey('foobar')
    ->save();

=> Stancl\Tenancy\Tenant {#3087
     +data: [
       "id" => "b07aa3b0-dc68-11e9-9352-9159b2055c42",
       "paypal_api_key" => "foobar",
     ],
     +domains: [
       "foo.localhost",
     ],
   }
```

These methods make the most sense (= sound the best) during tenant creation:

```php
// $domains = ['foo.yourapp.com', 'foo.com'];
$primary_domain = $domains[0];
$id = $primary_domain . $this->randomString(24);

Tenant::new()
  ->withDomains($domains)
  ->withPaypalApiKey('defaultApiKey');
  ->withId($id)
  ->save();
```