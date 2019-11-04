---
title: Central App
description: Central App
extends: _layouts.documentation
section: content
---

# Central App {#central-app}

This package uses routes to separate the tenant part of the application from the central part of the application. The central part will commonly include a landing page, sign up form, and some sort of dashboard.

## Central routes {#central-routes}

Routes in the `routes/web.php` file are the central routes. When they are visited, tenancy is *not* intialized and any model, cache call, controller, job dispatch, Redis call and anything else that is called in during this request will be central.

## Central domains {#central-domains}

However, since you don't want routes related to the app on your main domain and sign up forms on tenant domains, you must also define what domains host the central stuff in the `tenancy.exempt_domains` config.

## Using central things inside the tenant app {#using-central-things-inside-the-tenant-app}

To use central things (databases/caches/Redis connections/filesystems/...) on special places of your tenant app, you may do the following.

### Central database {#central-database}

Create a new connection and use it like `DB::connection($connectionName)->table('foo')->where(...)`

If you want to use models, create a `getConnectionName()` method that returns the name of the central connection

### Central redis {#central-redis}

Create a new connection, *don't* put it into `tenancy.redis.prefixed_connections`, and use it like `Redis::connection('foo')->get('bar')`

### Central cache {#central-cache}

Use the `GlobalCache` facade, or the `global_cache()` helper.

### Central storage {#central-storage}

Create a disk and *don't* add it to `tenancy.filesystem.disks`.

### Central assets {#central-assets}

Mix is intended for template-related assets and as such, it's not scoped to the current tenant.

Alternatively, the package provides a `global_asset()` helper which is a non-tenant-aware replacement for `asset()`, in case you don't want to use `mix()`.

It's recommended to use `mix()` though, due to its features such as version tagging.

### Central queues {#central-queues}

Create a new queue connection with the `central` key set to `true`.
