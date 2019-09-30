---
title: Global Cache/Storage/Assets/...
description: Global Cache/Storage/Assets/...
extends: _layouts.documentation
section: content
---

# Global Cache/Storage/Assets/...

## Global Cache {#global-cache}

Use the `GlobalCache` facade, or the `global_cache()` helper.

## Global Storage {#global-storage}

Create a disk and *don't* add it to `tenancy.filesystem.disks`.

## Global Assets {#global-assets}

Use the `global_asset()` helper.

## Global Database {#global-database}

Create a new connection and use it like `DB::connection($connectionName)->table('foo')->where(...)`

## Global Redis {#global-redis}

Create a new connection, *don't* put it into `tenancy.redis.prefixed_connections`, and use it like `Redis::connection('foo')->get('bar')`

## Global Queues/Jobs {#global-queues-jobs}

Coming soon.

