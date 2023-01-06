---
title: Session scoping
extends: _layouts.documentation
section: content
---

# Session scoping {#session-scoping}

Session scoping is one thing that you might have to deal with yourself.

The issue occurs when you're using multiple tenant domains and databases. Users can change their session cookie's domain and their session data will be shared in another tenant's application.

Here's how you can prevent this.

## Storing sessions in the database {#storing-sessions-in-the-database}

Since the databases are automatically separated, simply using the database as the session driver will make this problem disappear altogether.

## Storing sessions in Redis {#storing-sessions-in-redis}

This is the same solution as using the DB session driver. If you use the [`RedisTenancyBootstrapper`]({{ $page->link('tenancy-bootstrappers') }}), your Redis databases will be automatically separated for your tenants, and as such, any sessions stored in those Redis databases will be scoped correctly.

## Using a middleware to prevent session forgery {#using-a-middleware-to-prevent-session-forgery}

Alternatively, you may use the `Stancl\Tenancy\Middleware\ScopeSessions` middleware on your tenant routes to make sure that any attempts to manipulate the session will result in a 403 unauthorized response.

This will work with all storage drivers, **but only assuming you use a domain per tenant.** If you use path identification, you **need** to store sessions in the database (if using multi-DB tenancy), or you need to use single-DB tenancy (which is probably more common with path identification).
