---
title: The two applications
extends: _layouts.documentation
section: content
---

# The two applications

You will find these two terms a lot throughout this documentation:

- central application
- tenant application

Those terms refer to the parts of your application that house the central logic, and the tenant logic.

The tenant application is executed in tenant context — usually with the tenant's database, cache, etc. The central application is executed **when there is no tenant**.

The central application will house your signup page **where tenants are created**, your admin panel used to **manage your tenants**, etc.

The tenant application will likely house the larger part of your application — the real service being used by your tenants.

TODO: Explain how to structure application code for clarity
