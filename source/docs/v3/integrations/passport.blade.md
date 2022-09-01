---
title: Laravel Passport integration
extends: _layouts.documentation
section: content
---

# Laravel Passport {#laravel-passport}

> **Tip:** If you just want to write an SPA application but don't need an API for some other use (e.g., a mobile app), you can avoid a lot of the complexity of writing SPAs by using [Inertia.js](https://inertiajs.com/).

> **Another tip:** Using Passport only in the central application doesn't require any additional configuration. You can just install it following [the official Laravel Passport documentation](https://laravel.com/docs/9.x/passport).

## **Using Passport in the tenant application only** {#using-passport-in-the-tenant-application-only}

> **Note:** Don't use the `passport:install` command. The command creates the encryption keys & two clients in the central application. Instead of that, we'll generate the keys and create the clients manually later.

To use Passport inside the tenant part of your application, you may do the following.

1. Publish the Passport migrations by running `php artisan vendor:publish --tag=passport-migrations` and move them your tenant migration directory (`database/migrations/tenant/`).
2. Publish the Passport config by running `php artisan vendor:publish --tag=passport-config`. Then, make Passport use the default database connection by setting the storage database connection to `null`. `passport:keys` puts the keys in the `storage/` directory by default – you can change that by setting the key path.
    ```php
    return [
        'storage' => [
            'database' => [
                'connection' => null,
            ],
        ],
        'key_path' => env('OAUTH_KEY_PATH', 'storage') // This is optional
    ];
    ```

3. Prevent Passport migrations from running in the central application by adding `Passport::ignoreMigrations()` to the `register` method in your `AppServiceProvider`.

4. Apply Passport migrations by running `php artisan tenants:migrate`.

5. Register the Passport routes in your `AuthServiceProvider` by adding the following code to the provider's `boot` method.
    ```php
    Passport::routes(null, ['middleware' => [
        InitializeTenancyByDomain::class, // Or other identification middleware of your choice
        PreventAccessFromCentralDomains::class,
    ]]);
    ```

6. Set up [the encryption keys](#passport-encryption-keys).

## **Using Passport in both the tenant and the central application** {#using-passport-in-both-the-tenant-and-the-central-application}
To use Passport in both the tenant and the central application, follow [the steps for using Passport in the tenant appliction](#using-passport-in-the-tenant-application-only) with the following adjustments:

1. Copy the Passport migrations to the central application, so that the Passport migrations are in both the central and the tenant application.
2. Remove `Passport::ignoreMigrations()` from the `register` method in your `AppServiceProvider` (if it is there).
3. In your `AuthServiceProvider`'s `boot` method, add the `'universal'` middleware to the Passport routes, and remove the `PreventAccessFromCentralDomains::class` middleware (if it is there). The routes should look like this:
```php
Passport::routes(null, ['middleware' => [
    'universal',
    InitializeTenancyByDomain::class
]]);
```
4. Enable [universal routes]({{ $page->link('features/universal-routes') }}) to make Passport routes accessible to both apps.

## **Passport encryption keys** {#passport-encryption-keys}
### **Shared keys** {#shared-keys}
To generate a single Passport key pair for the whole app, create Passport clients for your tenants by adding the following code to your [tenant database seeder]({{ $page->link('configuration/#seeder-parameters') }}).

```php
public function run()
{
    $client = new ClientRepository();

    $client->createPasswordGrantClient(null, 'Default password grant client', 'http://your.redirect.path');
    $client->createPersonalAccessClient(null, 'Default personal access client', 'http://your.redirect.path');
}
```
*You can set your tenant database seeder class in `config/tenancy.php` file at `seeder_parameters` key.*

Then, seed the database and generate the key pair by running `php artisan passport:keys`.

### **Tenant-specific keys** {#tenant-specific-keys}
> **Note:** The security benefit of doing this is negligible since you're likely already using the same `APP_KEY` for all tenants. This is a relatively complex approach, so before implementing it, make sure you really want it. **Using shared keys instead is strongly recommended.**

> **Warning:** The usage of tenant specific keys has not been fully tested. [Feel free to contribute to this section.]({{ $page->editLink() }})

If you want to use a unique Passport key pair for each tenant, there are multiple ways to store and load tenant Passport keys. The most straightforward way is to store them in the `Tenant model` and load them into the Passport configuration using the [Tenant Config]({{ $page->link('features/tenant-config') }}) feature. Then, you can access the keys like `$tenant->passport_public_key`.

To achieve that, enable the [Tenant Config]({{ $page->link('features/tenant-config') }}) feature, and configure the storage-to-config mapping in the `boot` method of your `TenancyServiceProvider` this way:
```php
\Stancl\Tenancy\Features\TenantConfig::$storageToConfigMap = [
    'passport_public_key' => 'passport.public_key',
    'passport_private_key' => 'passport.private_key',
];
```
