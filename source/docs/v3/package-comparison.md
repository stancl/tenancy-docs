---
title: Compared to other packages
extends: _layouts.documentation
section: content
---

# Compared to other packages {#compared-to-other-packages}

## hyn/multi-tenancy {#hyn-multi-tenancy}

This package intends to provide you with the necessary tooling for adding multi-tenancy **manually** to your application. It will give you model traits, classes for creating tenant databases, and some additional tooling.

It would have been a good option for when you want to implement multi-tenancy manually, but:

- It isn't being actively developed — no features have been added in the past ~year
- It makes testing a nightmare.

    Over the last few months, I've received this feedback:

    > But, I still can't run any tests in Hyn, and had some queuing problems I'm still nervous about.

    > At the moment, our app is using latest Laravel and latest hyn/tenancy. The only thing I don't like about it is that tests are extremely fragile to the point where I don't dare mess with anything for risk of breaking everything

    > By the way, this package is awesome! It's so much better than the hyn alternative which is a bit of a mess in my opinion... It is a pity that I did not come across it in the first place.

    I'm not sharing this to intentionally make hyn/multi-tenancy bad, but **be very careful if you decide to go with that package**.

## tenancy/tenancy {#tenancy-tenancy}

This package intends to provide you with a framework for building your own multi-tenancy implementation. The documentation is quite lacking, so I couldn't get a too detailed idea of what it does, but from my understanding, it gives you things like events which you can use to build your own multi-tenancy logic.

If you want the absolute highest flexibility and would otherwise build your own implementation, looking into this package might be useful.

However, if you're looking for a package that will help you make a multi-tenant project quickly, this is probably not the right choice.

## spatie/laravel-multitenancy {#tenacy-laravel-multitenancy}

This package is a very simple implementation of multi-tenancy.

It does the same thing as stancl/tenancy v2, but with far fewer features out of the box.

The only benefit I see in this package compared to v2 of stancl/tenancy is that it uses Eloquent out of the box, which makes things like Cashier integration easier. But, that's irrelevant since we're in v3 already and v3 uses Eloquent.

So, I suggest you consider this package only if you value simplicity for some reason, and aren't building anything with any amount of complexity and need for "business features".

## stancl/tenancy {#stancl-tenancy}

In my — biased, of course, but likely true as well — opinion, this package is the absolute best choice for the vast majority of applications.

The only packages I'd realistically consider are mine (of course) and tenancy/tenancy if you need something **very** custom, though I don't see the reason for that in 99% of applications.

This package attempts to be about as flexible as tenancy/tenancy, but also provide you with the absolute largest amount of out-of-the-box features and other tooling. It continues its path as the first package to have been using the automatic approach with adding many more features — most of which are "enterprise" features, in v3.

To give you an incomplete-but-good-enough list of features, this package supports:

- Multi-database tenancy
    - creating databases
        - MySQL
        - PostgreSQL
        - PostgreSQL (schema mode)
        - SQLite
    - creating database users
    - automatically switching the database
    - CLI commands, with more features than e.g. spatie/laravel-multitenancy
        - migrate
        - migrate:fresh
        - seed
- Single-database tenancy
    - model traits with global scopes
- Rich event system
- **Very high testability**
- Automatic tenancy
    - tenancy bootstrappers to switch:
        - database connections
        - redis connections
        - cache tags
        - filesystem roots
        - queue context
- Manual tenancy
    - model traits
- Out of the box tenant identification
    - domain identification
    - subdomain identification
    - path identification
    - request data identification
    - middleware classes for the methods above
    - CLI argument identification
    - manual identification (e.g. in tinker)
- Integration with many packages
    - spatie/laravel-medialibrary
    - spatie/laravel-activitylog
    - Livewire
    - Laravel Nova
        - for managing tenants
        - for **using inside the tenant application**
    - Laravel Horizon
    - Laravel Telescope
    - Laravel Passport
- **Syncing users (or any other database resources) between multiple tenant databases**
- Dependency injection of the current tenant
- Tenant **user impersonation**
- **Cached tenant lookup**, universal for all tenant resolvers
