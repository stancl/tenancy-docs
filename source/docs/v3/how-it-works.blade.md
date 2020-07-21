---
title: How it works
extends: _layouts.documentation
section: content
---


# How it works {how-it-works}

This package is very flexible and lets you use tenancy however you want. But it comes with sensible defaults that work like this out of the box:

- a request comes in
- the domain is used to identify the tenant
- the database, cache, etc are switched to that tenant's context

This happens using identification middleware and events.

[Tenant identification]({{ $page->link('tenant-identification') }})

[Event system]({{ $page->link('event-system') }})

Note that even though the default assumes you're using domains and the database-per-tenant model, you're free to customize this any way you want. **And it's easy to customize!** Just read on to get an understanding of how everything works.

TODO: Expand. Why this approach, etc. Maybe on the other page?