---
title: Introduction
extends: _layouts.documentation
section: content
---

# Introduction {#introduction}

## What is multi-tenancy? {#what-is-multi-tenancy}

Multi-tenancy is the ability to provide your service to multiple users (tenants) from a single hosted instance of the application. This is contrasted with deploying the application separately for each user.

You may find this talk insightful: [https://multitenantlaravel.com/](https://multitenantlaravel.com/). Simply going through the slides will give you 80% of the value of the talk in under five minutes.

Note that if you just want to, say, scope todo tasks to the current user, there's no need to use a multi-tenancy package. Just use calls like `auth()->user()->tasks()`. This is the simplest for of multi-tenancy.

This package is built around the idea that multi-tenancy usually means letting tenants have their own users which have their own resources, e.g. todo tasks. Not just users having tasks.

## Types of multi-tenancy {#types-of-multi-tenancy}

There are two **types** of multi-tenancy:

- single-database tenancy — tenants share one database and their data is separated using e.g. `where tenant_id = 1` clauses.
- multi-database tenancy — each tenant has his own database

This package lets you do both, though it focuses more on multi-database tenancy because that type requires more work on the side of the package and less work on your side. Whereas for single-database tenancy you're provided with a class that keeps track of the current tenant and model traits — and the rest is up to you.

## Modes of multi-tenancy {#modes-of-multi-tenancy}

The tenancy "mode" is a unique property of this package. In previous versions, this package was intended primarily for [automatic tenancy]({{ $page->link('automatic-mode') }}), which means that after a tenant was identified, things like database connections, caches, filesystems, queues etc were switched to that tenant's context — his data completely isolated from the rest.

In the current version, we're also making [manual tenancy]({{ $page->link('manual-mode') }}) a first-class feature. We provide you with things like model traits if you wish to scope the data yourself.

## Tenant identification {#tenant-identification}

For your application to be tenant-aware, a [tenant has to be identified]({{ $page->link('tenant-identification') }}). This package ships with a large number of identification middleware. You may identify tenants by domain, subdomain, domain OR subdomain at the same time, path or request data.
