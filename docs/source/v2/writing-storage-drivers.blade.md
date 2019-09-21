---
title: Writing Storage Drivers
description: Writing Storage Drivers
extends: _layouts.documentation_v2
section: content
---

# Writing Storage Drivers

If you don't want to use the provided DB/Redis storage drivers, you can write your own driver.

To create a driver, create a class that implements the `Stancl\Tenancy\Interfaces\StorageDriver` interface.

Here's an example:

```php

namespace App\StorageDrivers\MongoDBStorageDriver;

use Stancl\Tenancy\Tenant;
use Stancl\Tenancy\Interfaces\StorageDriver;

class MongoDBStorageDriver implements StorageDriver
{
    public function createTenant(Tenant $tenant): void
    {
        //
    }

    public function updateTenant(Tenant $tenant): void
    {
        //
    }

    public function deleteTenant(Tenant $tenant): void
    {
        //
    }

    public function findById(string $id): Tenant
    {
        //
    }

    public function findByDomain(string $domain): Tenant
    {
        //
    }

    public function all(array $ids = []): array
    {
        //
    }

    public function ensureTenantCanBeCreated(Tenant $tenant): void
    {
        //
    }

    public function withDefaultTenant(Tenant $tenant)
    {
        //
    }

    public function get(string $key, Tenant $tenant = null)
    {
        //
    }

    public function getMany(array $keys, Tenant $tenant = null)
    {
        //
    }

    public function put(string $key, $value, Tenant $tenant = null): void
    {
        //
    }

    public function putMany(array $kvPairs, Tenant $tenant = null): void
    {
        //
    }
}
```