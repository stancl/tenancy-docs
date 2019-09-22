---
title: Tenant Manager
description: Tenant Manager
extends: _layouts.documentation_v2
section: content
---

# Tenant Manager {#tenant-manager}

This page documents a couple of `TenantManager` methods you may find useful.

To call methods on `TenantManager`, you may use the `tenancy()` helper or the `Tenancy` facade.

### Finding tenant using id

```php
>>> \Tenancy::find('b07aa3b0-dc68-11e9-9352-9159b2055c42')
=> Stancl\Tenancy\Tenant {#3099
     +data: [
       "id" => "b07aa3b0-dc68-11e9-9352-9159b2055c42",
       "plan" => "free",
     ],
     +domains: [
       "foo.localhost",
     ],
   }
```

### Finding tenant by domain

You may use the second argument to specify the key(s) as a string/array.

```php
>>> tenancy()->findByDomain('bar.localhost')
=> Stancl\Tenancy\Tenant {#3091
     +data: [
       "id" => "b38b2bd0-dc68-11e9-adfc-ede94ab3b264",
     ],
     +domains: [
       "bar.localhost",
     ],
   }
```

### Getting the current tenant

One more way to get the current [tenant]({{ $page->link('tenants') }}) is to call `getTenant()` on `TenantManager`:

```php
tenancy()->getTenant()
```

If you want to get the value of a specific key from the array, you can an argument with the key.

```php
tenancy()->getTenant('id') // Does the same thing as tenant('id')
```

### Getting all tenants

This method returns a collection of arrays.

```php
>>> tenancy()->all()
=> Illuminate\Support\Collection {#3080
     all: [
       Stancl\Tenancy\Tenant {#3076
         +data: [
           "id" => "b07aa3b0-dc68-11e9-9352-9159b2055c42",
         ],
         +domains: [
           "foo.localhost",
         ],
       },
       Stancl\Tenancy\Tenant {#3075
         +data: [
           "id" => "b38b2bd0-dc68-11e9-adfc-ede94ab3b264",
         ],
         +domains: [
           "bar.localhost",
         ],
       },
     ],
   }
>>> tenancy()->all()->pluck('domains')
=> Illuminate\Support\Collection {#3108
     all: [
       [
         "foo.localhost",
       ],
       [
         "bar.localhost",
       ],
     ],
   }
```

### Deleting a tenant

```php
>>> $tenant = tenancy()->findByDomain('foo.localhost');
=> Stancl\Tenancy\Tenant {#3119
     +data: [
       "id" => "b07aa3b0-dc68-11e9-9352-9159b2055c42",
       "plan" => "free",
     ],
     +domains: [
       "foo.localhost",
     ],
   }
>>> $tenant->delete();
=> true
```

This doesn't delete the tenant's database. If you want to delete it, save the database name prior to deleting the tenant. You can get the database name using `getDatabaseName()`

```php
>>> $tenant->getDatabaseName()
=> "tenant67412a60-1c01-11e9-a9e9-f799baa56fd9"
```

If you want tenant databases to be deleted automatically, you may use the [`delete_database_after_tenant_deletion` configuration]({{ $page->link('configuration#delete-database-after-tenant-deletion') }})