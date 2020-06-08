---
title: Testing
extends: _layouts.documentation
section: content
---

# Testing

TODO: Review

## Central app

To test your central app, just write normal Laravel tests.

## Tenant app

Note: If you're using multi-database tenancy & the automatic mode, it's not possible to use `:memory:` SQLite databases or the `RefreshDatabase` trait due to the switching of default database.

To test the tenant part of the application, create a tenant in the `setUp()` method and initialize tenancy.

You may also want to do something like this:

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

    public function initializeTenancy()
    {
        $tenant = Tenant::create();
				tenancy()->initialize($tenant);
    }

    // ...
}
```

And in your individual test cases:

```php
class FooTest extends TestCase
{
    protected $tenancy = true;

    /** @test  */
    public function some_test()
    {
        $this->assertTrue(...);
    }
}
```

Or you may want to create a separate TestCase class for tenant tests, for better organization.