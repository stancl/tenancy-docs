---
title: Laravel Sail integration
extends: _layouts.documentation
section: content
---

# Laravel Sail {#sail}

## Central domains

If you're using Laravel Sail, no changes are needed, default values are good to go:

```php
// config/tenancy.php

'central_domains' => [
    '127.0.0.1',
    'localhost',
],
```

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
