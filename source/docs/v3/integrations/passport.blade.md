---
title: Laravel Passport integration
extends: _layouts.documentation
section: content
---

# Laravel Passport {#laravel-passport}

> **Tip:** If you only want to write a SPA application but don't need an API for some other use (for example, a mobile application), you can avoid much of the complexity by using [Inertia.js](https://inertiajs.com/).


## Passport use cases

- [Using Passport only in central application](#using-passport-only-in-central-application)
- [Using Passport only in tenant application](#using-passport-only-in-tenant-application)
- [Using Passport in both the central and tenant application](#using-passport-in-both-the-central-and-tenant-application)

## Passport keys
- [Manage Passport keys](#manage-passport-keys)
    - [Shared keys](#shared-keys)
    - [Tenant-specific keys](#tenant-specific-keys)

### **Using Passport only in central application** {#using-passport-only-in-central-application}
You don't have to do anything special in this use case, just install **Laravel Passport** as its official documentation explains:

[Laravel Passport official documentation](https://laravel.com/docs/9.x/passport)

### **Using Passport only in tenant application** {#using-passport-only-in-tenant-application}
To use **Laravel Passport** inside the tenant application, you must follow the following steps:

1. Don't use `passport:install` command. Instead of that, publish `migrations` and `config` manually:
    - Run `php artisan vendor:publish --tag=passport-migrations` command and **MOVE** (not copy) all of them to `database/migrations/tenant/` directory.

    - Run `php artisan vendor:publish --tag=passport-config` command. After that, open `config/passport.php` file and set storage database connection to `null`. This will make Passport use the default connection:
        ```php
        return [
            'storage' => [
                'database' => [
                    'connection' => null,
                ],
            ],
        ];
        ```

2. Add this code to the `register` method in your `AppServiceProvider` to prevent Passport migrations from running in the central application:
    ```php
    Passport::ignoreMigrations();
    ```

3. Apply Passport migrations running `php artisan migrate` command.

4. Register Passport routes adding this code to the `boot` method in your `AuthServiceProvider`:
    ```php
    Passport::routes(null, ['middleware' => [
        InitializeTenancyByDomain::class, // Or whatever tenant identification middlewares you're going to use
        PreventAccessFromCentralDomains::class,
    ]]);
    ```

5. To automatically create Passport Clients in your tenant databases, add the following code to your tenant seeder class:
    ```php
    public function run()
    {
        $client = new ClientRepository();

        $client->createPasswordGrantClient(null, 'Default password grant client', 'http://your.redirect.path');
        $client->createPersonalAccessClient(null, 'Default personal access client', 'http://your.redirect.path');
    }
    ```
    *You can set your tenant database seeder class in `config/tenancy.php` file at `seeder_parameters` key.*

6. Create Passport keys following [Manage Passport keys](#manage-passport-keys) section.


### **Using Passport in both the central and tenant application** {#using-passport-in-both-the-central-and-tenant-application}
To use **Laravel Passport** on central and tenant application, you must follow the following steps:

1. Don't use `passport:install` command. Instead of that, publish `migrations` and `config` manually:
    - Run `php artisan vendor:publish --tag=passport-migrations` command and **COPY** all of them to `database/migrations/tenant/` directory.

    - Run `php artisan vendor:publish --tag=passport-config` command. After that, open `config/passport.php` file and set storage database connection to `null`. This will make Passport use the default connection:
        ```php
        return [
            'storage' => [
                'database' => [
                    'connection' => null,
                ],
            ],
        ];
        ```

2. Apply Passport migrations running `php artisan migrate` command.

3. Enable [Universal Routes]({{ $page->link('universal-routes') }}) feature to allow Passport routes being accessible in both apps.

4. Register Passport routes adding this code to the `boot` method in your `AuthServiceProvider`:
    ```php
    Passport::routes(null, ['middleware' => [
        'universal',
        InitializeTenancyByDomain::class, // Or whatever tenant identification middlewares you're going to use
    ]]);
    ```

5. To create Passport Clients in your central app, just use `php artisan passport:client` commands. To automatically create Passport Clients in your tenant databases, add the following code to your tenant seeder class:
    ```php
    public function run()
    {
        $client = new ClientRepository();

        $client->createPasswordGrantClient(null, 'Default password grant client', 'http://your.redirect.path');
        $client->createPersonalAccessClient(null, 'Default personal access client', 'http://your.redirect.path');
    }
    ```
    *You can set your tenant database seeder class in `config/tenancy.php` file at `seeder_parameters` key.*

6. Create Passport keys following [Manage Passport keys](#manage-passport-keys) section.


### **Manage Passport keys** {#manage-passport-keys}
#### **Shared keys** {#shared-keys}
If you want to use the same Passport keys for all your tenants and your central application (in case you are using Passport in your central app), you only have to run `php artisan passport:keys` command and you are done.

#### **Tenant-specific keys** {#tenant-specific-keys}
> **Note:** The security benefit of doing this isn't probably that big, since you're likely already using the same `APP_KEY` for all tenants. This is a relatively complex approach, so before implementing it, make sure you really want it.

If you want to use an unique Passport keys for each tenant, there are multiple ways you can store and load tenant Passport keys, but the most straightforward way is to store the keys in the `Tenant model` and load them into the passport configuration using the [Tenant Config]({{ $page->link('features/tenant-config') }}) feature.

Once the [Tenant Config]({{ $page->link('features/tenant-config') }}) feature is enabled, simply map your tenant Passport keys into the `boot` method of your `TenancyServiceProvider` as follows:
```php
\Stancl\Tenancy\Features\TenantConfig::$storageToConfigMap = [
    'passport_public_key' => 'passport.public_key',
    'passport_private_key' => 'passport.private_key',
];
```
