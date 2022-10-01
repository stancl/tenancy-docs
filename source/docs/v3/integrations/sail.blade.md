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

### Specifying Database Credentials {#specifying-database-credentials}

If you want to use custom users (one user for each database), you will need `GRANT OPTION` grant on your central database user (`sail` in this case), otherwise you cannot grant permissions to the newly created user.

Just run the following SQL from root user:

```bash
GRANT GRANT OPTION on central_database.* to 'sail'@'%';
FLUSH PRIVILEGES;
```

>For more info see [Specifying Database Credentials]({{ $page->link('customizing-databases#specifying-database-credentials') }})
