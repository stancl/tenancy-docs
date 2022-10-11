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

While working with sail, it offers a database user `sail` which just have the privileges for just the one database created at the inception of the project (central database in our tenancy case). This user does not have the privileges to create new users or `GRANT OPTION` privilege, which is used to grant permissions to other users.

If you want to use custom users (one user for each respective database), you will need `GRANT OPTION` grant on your central database user (`sail` in this case), otherwise you cannot grant permissions to the newly created user and will result in an error.

To avoid this failure, run the following SQL from root user:

```sql
GRANT GRANT OPTION on central_database.* to 'sail'@'%';
FLUSH PRIVILEGES;
```

>For more info see [Specifying Database Credentials]({{ $page->link('customizing-databases#specifying-database-credentials') }})
