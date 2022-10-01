---
title: Laravel Sail integration
extends: _layouts.documentation
section: content
---

# Laravel Sail {#sail}

## Creating tenants

Before creating any tenants you have to ensure that the `sail` user has the necessary permissions.

To do so either login to the mysql shell or via any client using root user credentials and run the following queries:

```bash
GRANT ALL PRIVILEGES on *.* to 'sail'@'%';
FLUSH PRIVILEGES;
```

If you are using [Database Customization]({{ $page->link('customizing-databases') }}), then you will have add the following GRANT as well:

```bash
GRANT GRANT OPTION on central_database.* to 'sail'@'%';
FLUSH PRIVILEGES;
```

This grant allows the central database to grant permissions to other users.
