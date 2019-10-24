---
title: Application Testing
description: Application Testing..
extends: _layouts.documentation
section: content
---

# Application Testing {#application-testing}

To test your application with this package installed, you can create tenants in the `setUp()` method of your test case:

```php
protected function setUp(): void
{
    parent::setUp();

    tenancy()->create('test.localhost');
    tenancy()->init('test.localhost');
}
```

If you're using the database storage driver, you will also need to run the migrations:
```php
protected function setUp(): void
{
    parent::setUp();

    $this->artisan('migrate');

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
