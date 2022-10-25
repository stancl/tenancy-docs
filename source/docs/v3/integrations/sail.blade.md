---
title: Laravel Sail integration
extends: _layouts.documentation
section: content
---

## Creating tenants

By default sail has the `ALL` privilege on the default database (here it is the central database).
In order to create, read, update and delete operations related to the database, we will assign `ALL` privilege on all databases via the wildcard `*`;

To do so either login to the mysql shell or via any client using root user credentials and run the following statements

```bash
GRANT ALL PRIVILEGES on *.* to 'sail'@'%';
FLUSH PRIVILEGES;
```
