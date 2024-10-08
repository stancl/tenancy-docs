---
title: Testing
extends: _layouts.documentation
section: content
---

# Testing {#testing}

> If you're a sponsor, you can get an opinionated, but automatic testing setup on the site with exclusive content for sponsors: https://sponsors.tenancyforlaravel.com/frictionless-testing-setup

TODO: Review

## Events {#events}

Keep in mind that the package makes heavy use of events, so if you use `Event::fake()` anywhere in your tests, tenancy initialization and related processes might break.

For that reason, try to be selective about faking tests. Use for example:

```php
Event::fake([MyEvent::class]);
```

rather than

```php
Event::fake();
```

## Central app {#central-app}

To test your central app, just write normal Laravel tests.

## Tenant app {#tenant-app}

Note: If you're using multi-database tenancy & the automatic mode, it's not possible to use `:memory:` SQLite databases or the `RefreshDatabase` trait due to the switching of default database.

To test the tenant part of the application, create a tenant in the `setUp()` method and initialize tenancy.

You may also want to do something like this:

```php
class TestCase // extends ...
{
    protected $tenancy = false;

    public function setUp(): void
    {
        parent::setUp();

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

When using `InitializeTenancyBySubdomain` you need disable this middleware while testing. This middleware will cause your tests on tenant routes to return a 404 error. Disabling the middleware can be done in the `TestCase` as well. For example:
```php
public function setUp(): void
{
    parent::setUp();

    if ($this->tenancy) {
        $this->initializeTenancy();

         $this->withoutMiddleware([
            InitializeTenancyBySubdomain::class,
         ]);
    }
}
