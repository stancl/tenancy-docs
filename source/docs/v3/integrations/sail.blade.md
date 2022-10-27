---
title: Laravel Sail integration
extends: _layouts.documentation
section: content
---

# Laravel Sail {#sail}

Sail can only perform the create, read, update and delete operations in the central database by default. To give Sail permission to also perform these operations in tenant databases, log in to Sail's MySQL shell as the root user (`docker-compose exec mysql bash`, then `mysql -u root -p` – by default, the password is `password`) and grant the `sail` user access to all databases by running the following statements:

```bash
GRANT ALL PRIVILEGES on *.* to 'sail'@'%';
FLUSH PRIVILEGES;
```
