---
title: Queues
extends: _layouts.documentation
section: content
---

# Queues {#queues}

If you're using the `QueueTenancyBootstrapper`, queued jobs dispatched from the tenant context will be automatically tenant-aware. The jobs will be stored centrally — if you're using the database queue driver, they will be stored in the `jobs` table in the central database. And tenancy will be initialized for the current tenant prior to the job being processed.

**However**, note that if you're using the `DatabaseTenancyBootstrapper` and the `database` queue driver, or the `RedisTenancyBootstrapper` and the `redis` queue driver, you will need to make sure the jobs don't get dispatched into the tenant context for these drivers.

Note: You cannot inject model **instances** with the `SerializesModels` trait, because it tries to hydrate the models before the `tenant` connection is created. Inject model ids instead and use `find()` in the handle method.

### Database queue driver {#database-queue-driver}

To force the database queue driver to use the central connection, open your `queue.connections.database` config and add the following line:

```jsx
'connection' => 'central',
```

(Replace `central` with the name of your central database connection.)

### Redis queue driver {#redis-queue-driver}

Make sure the connection used by the queue is not in `tenancy.redis.prefixed_connections`.

## Central queues {#central-queues}

Jobs dispatched from the central context will remain central. However, it's recommended not to mix queue **connections** for central & tenant jobs due to potential leftover global state, e.g. central jobs thinking they're in the previous tenant's context.

To dispatch a job such that it will run centrally under all circumstances, create a new queue connection and set the `central` key to `true`. For example:

```jsx
// queue.connections
'central' => [
    'driver' => 'database',
    'table' => 'jobs',
    'queue' => 'default',
    'retry_after' => 90,
    'central' => true, // <---
],
```

And use this connection like this:

```jsx
dispatch(new SomeJob(...))->onConnection('central');
```
