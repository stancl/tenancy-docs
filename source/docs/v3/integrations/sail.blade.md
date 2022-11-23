---
title: Laravel Sail integration
extends: _layouts.documentation
section: content
---

# Laravel Sail {#sail}

> Note: This guide covers Sail integration using MySQL. The steps described in the guide will need adjustments if you're using a database other than MySQL.

> The default Sail user's name is determined by the `DB_USERNAME` variable in your `.env`. For this guide, we'll be using the username `sail`.

The default Sail user can only perform the create, read, update and delete operations in the central database. To allow the user to perform these operations in the tenant databases too, log in to Sail's MySQL shell as the root user (`docker-compose exec mysql bash`, then `mysql -u root -p` – by default, the password is determined by the `DB_PASSWORD` variable in your `.env`) and grant the Sail user access to all databases by running the following statements:

```sh
GRANT ALL PRIVILEGES on *.* to 'sail'@'%';
FLUSH PRIVILEGES;
```
