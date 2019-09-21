---
title: Integrations
description: Integrating stancl/tenancy
extends: _layouts.documentation_v2
section: content
---

# Integrations {#integrations}

This package naturally integrates well with Laravel packages, since it does not rely on you explicitly specifying database connections.

There are some exceptions, though. [Telescope integration]({{ $page->link('telescope') }}), for example, requires you to change the database connection in `config/telescope.php` to a non-default one, because the default connection is switched to the tenant connection. Some packages should use a central connection for data storage.
