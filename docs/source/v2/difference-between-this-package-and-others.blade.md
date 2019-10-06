---
title: Difference Between This Package And Others
description: Difference Between This Package And Others
extends: _layouts.documentation
section: content
---

# Difference Between This Package And Others

A frequently asked question is the difference between this package and other tenancy packages for Laravel.

## tenancy/multi-tenant (previously hyn/multi-tenant)

tenancy/multi-tenant gives you an API for making your application multi-tenant yourself. It gives you a tenant DB connection, traits to apply on your models, a guide on creating your own tenant-aware cache, etc.

## tenancy/tenancy (currently in alpha)

tenancy/tenancy is even less opinionated and is more of a framework to write your own tenancy implementation. For example, there is no tenant object. There is a tenant interface that you implement on some model in your application.

## stancl/tenancy

This package takes a completely new approach to multi-tenancy.

It makes your application multi-tenant automatically and attempts to make you not have to change anything in your code. The philosophy behind this approach is that you should write your app, not tenancy boilerplate.

We belive that your code will be a lot cleaner if tenancy and the actual app don't mix. Why pollute your code with tons of tenancy implementations, when you can push all of tenancy one layer below your actual application?

Apart from saving you a ton of time, the benefit of going with the automatic approach is that you can adapt easily, since you're not bound to a specific implementation of multi-tenancy. [You can always change how tenancy is bootstrapped.]({{ $page->link('tenancy-bootstrappers') }})

This approach is also more secure. Say you have written a SaaS. The application is finished &mdash; now you just need to make it multi-tenant before releasing it. With the tenancy/\* packages, you will have to rewrite significant portions of your code and hope you did not forget to change each, for example, `Cache::` call to some tenant-aware cache that you implement yourself.

With stancl/tenancy, you just install the package, decide what routes belong to the "central" part of the app and what routes belong to the tenant part of the app, and tell the config file on what domains you host the central app &mdash; the landing page & sign up form.

Everything else happens automatically in the background:
- Database connection is switched
- Cache is made multi-tenant
- Filesystem is made multi-tenant
- Queued jobs are made multi-tenant
- Redis is made multi-tenant

This means that you can also integrate with any packages you would normally use, without any difficulties.

We believe that this seamless approach to multi-tenancy is consistent with Laravel's "developer happiness from download to deploy".
