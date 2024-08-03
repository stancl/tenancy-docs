---
title: Real-time facades
extends: _layouts.documentation
section: content
---

# Real-time facades {#real-time-facades}

When using `storage_path()` suffixing (for local filesystem tenancy), each tenant gets a separate subdirectory in `storage/`.

This means that storage paths look like this:
```
storage/tenant123/app/foo.png
```

**not** like this:
```
storage/app/tenant123/foo.png
```

This means that the other directories in `storage/` are also tenant-scoped. Importantly, the `framework` directory.

## The issue with real-time facades {#the-issue-with-real-time-facades}

When real-time facades are used, Laravel creates a PHP file with facade-like code, stores it in `storage_path/framework/cache` and autoloads it.

## Creating framework directories for tenants {#creating-framework-directories-for-tenants}

To solve this, you need to create these directories for tenants. But note that you only need this if:

1. you're using `storage_path()` suffixing (enabled in `tenancy` config)
2. **and** you're using real-time facades

You can create these directories by using the [event system]({{ $page->link('event-system') }}).

Use a job pipeline, because you need to initialize tenancy to run this code & you need tenancy initialization to even be possible (you can't initialize tenancy before the tenant's database is created, for example).

Add a job like this to your `TenantCreated` job pipeline:

```php
<?php

namespace App\Jobs;

use Stancl\Tenancy\Contracts\Tenant;

class CreateFrameworkDirectoriesForTenant
{
    protected $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle()
    {
        $this->tenant->run(function ($tenant) {
            $storage_path = storage_path();

            mkdir("$storage_path/framework/cache", 0777, true);
        });
    }
}
```

## Deleting framework directories for tenants {#deleting-framework-directories-for-tenants}

If you used the previous solution and created the framework directories for a tenant, then you may be interested in
deleting the framework directories once the tenant has been destroyed. Similarly, you will have to create a new `Job` that
will remove any framework files created previously.

Similarly, create a new `Job` like the one below, and add the `Job` to the `TenantDeleted` job pipeline

```php
<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\File;
use Stancl\Tenancy\Contracts\Tenant;

class DeleteFrameworkDirectoriesForTenant implements ShouldQueue
{
    protected Tenant $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle(): void
    {
        $this->tenant->run(function ($tenant) {
            $storage_path = storage_path();

            File::deleteDirectory($storage_path);
        });
    }
}
```