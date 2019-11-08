---
title: Application Testing
description: Application Testing..
extends: _layouts.documentation
section: content
---

# Application Testing {#application-testing}

> Note: You cannot use `:memory:` SQLite databases or the `RefreshDatabase` trait due to the switching of default database.

To test your application with this package installed, you can create tenants in the `setUp()` method of your test case:

```php
protected function setUp(): void
{
    parent::setUp();

    tenancy()->create('test.localhost');
    tenancy()->init('test.localhost');
}
```

And to delete tenants & their databases after tests:
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

If you're using the database storage driver, you will also need to run the migrations:
```php
protected function setUp(): void
{
    parent::setUp();

    $this->artisan('migrate:fresh');

    tenancy()->create('test.localhost');
    tenancy()->init('test.localhost');
}
```

If you're using the Redis storage driver, flush the database in `setUp()`:

```php
protected function setUp(): void
{
    parent::setUp();

    // make sure you're using a different connection for testing to avoid losing data
    Redis::connection('tenancyTesting')->flushdb();

    tenant()->create('test.localhost');
    tenancy()->init('test.localhost');
}
```
