---
title: Tenancy Bootstrappers
description: Tenancy Bootstrappers
extends: _layouts.documentation
section: content
---

# Tenancy Bootstrappers {#tenancy-bootstrappers}

These are the classes that do the magic. When tenancy is initialized, TenancyBootstrappers are executed, making Laravel tenant-aware.

All Tenancy Bootstrappers must implement the `Stancl\Tenancy\Contracts\TenancyBootstrapper` interface. 

When tenancy is [initialized]({{ $page->link('tenancy-initialization') }}), the `start()` method on the [enabled bootstrappers]({{ $page->link('configuration#bootstrappers') }}) is called.

Conversely, when tenancy is ended, the `end()` method is called.

In the [`tenancy.bootstrappers` configuration]( {{ $page->link('configuration#bootstrappers') }} ), bootstrappers have an alias configured (e.g. `database`) that is used by [events]({{ $page->link('hooks') }}) to say which bootstrappers are prevented.
