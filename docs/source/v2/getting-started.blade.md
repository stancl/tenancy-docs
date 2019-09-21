---
title: Getting Started
description: Getting started.
extends: _layouts.documentation_v2
section: content
---

# Getting Started {#getting-started}

[**stancl/tenancy**](https://github.com/stancl/tenancy) is a Laravel multi-database tenancy package. It makes your app multi-tenant in a way that requires no changes to the codebase. Instead of applying traits on models and replacing every single reference to cache by a reference to a tenant-aware cache, the package lets you write your app without thinking about tenancy. It handles tenancy automatically in the background.

## How does it work? {#how-does-it-work}

A user visits `client1.yourapp.com`. The package identifies the tenant who this domain belongs to, and automatically does the following:
- switches database connection
- replaces the default cache manager
- switches Redis connection
- changes filesystem root paths
- makes jobs automatically tenant-aware

The benefits of this being taken care of by the package are:
- separation of concerns: you should write your app, not tenancy implementations
- reliability: you won't have to fear that you forgot to replace a reference to cache by a tenant-aware cache call. This is something you might worry about if you're implementing tenancy into an existing application.

## What is multi-tenancy? {#what-is-multi-tenancy}

Multi-tenancy is the ability to provide your application to multiple customers (who have their own users and other resources) from a single instance of your application. Think Slack, Shopify, etc.

Multi-tenancy can be single-database and multi-database.

**Single-database tenancy** means that your application uses only a single database. The way this is usually implemented is that instead of having the `id`, `title`, `user_id` and `body` columns in your `posts` table, you will also have a `tenant_id` column. This approach works until you need custom databases for your clients. It's also easy to implement, it basically boils down to having your models use a trait which adds a [global scope](https://laravel.com/docs/master/eloquent#global-scopes).

**Multi-database tenancy**, the type that this package provides, lets you use a separate database for each tenant. The benefits of this approach are scalability, compliance (some clients need to have the database on their server) and mitigation of risks such as showing the wrong tenant's data to a user. The downside is that this model is harder to implement, which is why this package exists.