---
title: Application Testing
description: Application Testing..
extends: _layouts.documentation
section: content
---

# Application Testing {#application-testing}

> Note: At the moment it's not possible to use `:memory:` SQLite databases or the `RefreshDatabase` trait due to the switching of default database. This will hopefully change in the future.

### Initializing tenancy

You can create tenants in the `setUp()` method of your test case:

```php
protected function setUp(): void
{
    parent::setUp();

    tenancy()->create('test.localhost');
    tenancy()->init('test.localhost');
}
```

If you don't want to initialize tenancy before each test, you may want to do something like this:
```php
class TestCase // extends ...
{
    protected $tenancy = false;

    public function setUp(): void
    {
        if ($this->tenancy) {
            $this->initializeTenancy();
        }
    }

    public function initializeTenancy($domain = 'test.localhost')
    {
        tenancy()->create($domain);
        tenancy()->init($domain);
    }

    // ...
}
```

And in your individual test classes:
```php
class FooTest
{
    protected $tenancy = true;

    /** @test */
    public function some_test()
    {
        $this->assertTrue(...);
    }
}
```

### Cleanup

To delete tenants & their databases after tests, you may use this:
```php
public function tearDown(): void
{
    config([
        'tenancy.queue_database_deletion' => false,
        'tenancy.delete_database_after_tenant_deletion' => true,
    ]);
    tenancy()->all()->each->delete();

    parent::tearDown();
}
```

### Storage setup

If you're using the database storage driver, you will need to run the migrations in `setUp()`:
```php
protected function setUp(): void
{
    parent::setUp();

    $this->artisan('migrate:fresh');

    // ...
}
```

If you're using the Redis storage driver, flush the database in `setUp()`:

```php
protected function setUp(): void
{
    parent::setUp();

    // make sure you're using a different connection for testing to avoid losing data
    Redis::connection('tenancyTesting')->flushdb();

    // ...
}
```

### Sample TestCase

Put together, here's a ready-to-use base TestCase for the DB storage driver
```php
<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        config([
            'tenancy.queue_database_creation' => false,
        ]);

        config(['tenancy.exempt_domains' => [
            '127.0.0.1',
            'localhost',
        ]]);
    }

    public function tearDown(): void
    {
        config([
            'tenancy.queue_database_deletion' => false,
            'tenancy.delete_database_after_tenant_deletion' => true,
        ]);
        tenancy()->all()->each->delete();

        parent::tearDown();
    }
}
```

phpunit.xml:
```xml
<server name="DB_DRIVER" value="sqlite"/>
<server name="DB_DATABASE" value="database/testing.sqlite"/>
```

> Don't forget to create an empty database/testing.sqlite

You may also wish toa dd `testing.sqlite` to `database/.gitignore`.