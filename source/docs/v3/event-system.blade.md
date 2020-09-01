---
title: Event system
extends: _layouts.documentation
section: content
---


# Event system {#event-system}

This package is heavily based around events, which makes it incredibly flexible.

By default, the events are configured in such a way that the package works like this:

- A request comes in for a tenant route and hits an identification middleware
- The identification middleware finds the correct tenant and runs

```php
$this->tenancy->initialize($tenant);
```

- The `Stancl\Tenancy\Tenancy` class sets the `$tenant` as the current tenant and fires a `TenancyInitialized` event
- The `BootstrapTenancy` class catches the event and executes classes known as [tenancy bootstrappers]({{ $page->link('tenancy-bootstrappers') }}).
- The tenancy bootstrappers make changes to the application to make it "scoped" to the current tenant. This by default includes:
    - Switching the database connection
    - Replacing `CacheManager` with a scoped cache manager
    - Suffixing filesystem paths
    - Making queues store the tenant id & initialize tenancy when being processed

Again, all of the above is configurable. You might even disable all tenancy bootstrappers, and just use tenant identification and scope your app manually around the tenant stored in `Stancl\Tenancy\Tenancy`. The choice is yours.

# TenancyServiceProvider {#tenancyserviceprovider}

This package comes with a very convenient service provider that's added to your application when you install the package. This service provider is used for mapping listeners to events specific to the package and is the place where you should put any tenancy-specific service container calls — to not pollute your AppServiceProvider.

Note that you can register listeners to this package's events **anywhere you want**. The event/listener mapping in the service provider exists only to make your life easier. If you want to register the listeners manually, like in the example below, you can.

```php
Event::listen(TenancyInitialized::class, BootstrapTenancy::class);
```

# Bootstrapping tenancy {#bootstrapping-tenancy}

By default, the `BootstrapTenancy` class is listening to the `TenancyInitialized` event (exactly as you can see in the example above). That listener will execute the configured tenancy bootstrappers to transition the application into the tenant's context. You can read more about this on the [tenancy bootstrappers]({{ $page->link('tenancy-bootstrappers') }}) page.

Conversely, when the `TenancyEnded` event fires, the `RevertToCentralContext` event transitions the app back into the central context.

# Job pipelines {#job-pipelines}

You may want to use job pipelines even in projects that don't use this package — I think they're a cool concept so they're extracted into a separate package: [github.com/stancl/jobpipeline](https://github.com/stancl/jobpipeline)

The `JobPipeline` is a simple, yet **extremely powerful** class that lets you **convert any (series of) jobs into event listeners.**

You may use a job pipeline like any other listener, so you can register it in the `TenancyServiceProvider`, `EventServiceProvider` using the `$listen` array, or in any other place using `Event::listen()` — up to you.

## Creating job pipelines {creating-job-pipelines}

To create a job pipeline, start by specifying the jobs you want to use:

```php
use Stancl\JobPipeline\JobPipeline;
use Stancl\Tenancy\Jobs\{CreateDatabase, MigrateDatabase, SeedDatabase};

JobPipeline::make([
    CreateDatabase::class,
    MigrateDatabase::class,
    SeedDatabase::class,
])
```

Then, specify what variable you want to pass to the jobs. This will usually come from the event.

```php
use Stancl\JobPipeline\JobPipeline;
use Stancl\Tenancy\Jobs\{CreateDatabase, MigrateDatabase, SeedDatabase};
use Stancl\Tenancy\Events\TenantCreated;

JobPipeline::make([
    CreateDatabase::class,
    MigrateDatabase::class,
    SeedDatabase::class,
])->send(function (TenantCreated $event) {
    return $event->tenant;
})
```

Next, decide if you want to queue the pipeline. By default, pipelines are synchronous (= not queued) by default.

If you **do** want pipelines to be queued by default, you can do that by setting a static property:
`\Stancl\JobPipeline\JobPipeline::$shouldBeQueuedByDefault = true;`

```php
use Stancl\Tenancy\Events\TenantCreated;
use Stancl\JobPipeline\JobPipeline;
use Stancl\Tenancy\Jobs\{CreateDatabase, MigrateDatabase, SeedDatabase};

JobPipeline::make([
    CreateDatabase::class,
    MigrateDatabase::class,
    SeedDatabase::class,
])->send(function (TenantCreated $event) {
    return $event->tenant;
})->shouldBeQueued(true),
```

Finally, convert the pipeline to a listener and bind it to an event:

```php
use Stancl\Tenancy\Events\TenantCreated;
use Stancl\JobPipeline\JobPipeline;
use Stancl\Tenancy\Jobs\{CreateDatabase, MigrateDatabase, SeedDatabase};
use Illuminate\Support\Facades\Event;

Event::listen(TenantCreated::class, JobPipeline::make([
    CreateDatabase::class,
    MigrateDatabase::class,
    SeedDatabase::class,
])->send(function (TenantCreated $event) {
    return $event->tenant;
})->shouldBeQueued(true)->toListener());
```

Note that you can use job pipelines even for converting single jobs to event listeners. That's useful if you have some logic in job classes and don't want to create listener classes just to be able to run these jobs as a result of an event being fired.

# Available events {#available-events}

Note: Some database events (`DatabaseMigrated`, `DatabaseSeeded`, `DatabaseRolledback` and possibly others) are **fired in the tenant context.** Depending on how your application bootstraps tenancy, you might need to be specific about interacting with the central database in these events' listeners — that is, if you need to.

Note: All events are located in the `Stancl\Tenancy\Events` namespace.

### **Tenancy** {#tenancy}

- `InitializingTenancy`
- `TenancyInitialized`
- `EndingTenancy`
- `TenancyEnded`
- `BootstrappingTenancy`
- `TenancyBootstrapped`
- `RevertingToCentralContext`
- `RevertedToCentralContext`

Note the difference between *initializing tenancy and bootstrapping* tenancy. Tenancy is initialized when a tenant is loaded into the `Tenancy` object. Whereas bootstrapping happens **as a result of initialization** — if you're using automatic tenancy, the `BootstrapTenancy` class is listening to the `TenancyInitialized` event and after it's done executing bootstrappers, it fires an event saying that tenancy was bootstrapped. You want to use the bootstrapped event if you want to execute something **after the app has been transitioned to the tenant context.**

### Tenant {#tenant}

The following events are dispatched as a result of Eloquent events being fired in the default `Tenant` implementation (the most often used events are bold):

- `CreatingTenant`
- **`TenantCreated`**
- `SavingTenant`
- `TenantSaved`
- `UpdatingTenant`
- `TenantUpdated`
- `DeletingTenant`
- **`TenantDeleted`**

### Domain {#domain}

These events are optional. They're only relevant to you if you're using domains for your tenants.

- `CreatingDomain`
- **`DomainCreated`**
- `SavingDomain`
- `DomainSaved`
- `UpdatingDomain`
- `DomainUpdated`
- `DeletingDomain`
- **`DomainDeleted`**

### Database {#database}

These events are also optional. They're relevant to you if you're using multi-database tenancy:

- `CreatingDatabase`
- **`DatabaseCreated`**
- `MigratingDatabase`
- `DatabaseMigrated`
- `SeedingDatabase`
- `DatabaseSeeded`
- `RollingBackDatabase`
- `DatabaseRolledBack`
- `DeletingDatabase`
- **`DatabaseDeleted`**

### Resource syncing {#resource-syncing}

- **`SyncedResourceSaved`**
- `SyncedResourceChangedInForeignDatabase`
