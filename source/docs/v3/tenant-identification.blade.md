---
title: Tenant identification
extends: _layouts.documentation
section: content
---

# Tenant identification {#tenant-identification}

The package lets you identify tenants using the following methods:

- Domain identification (`acme.com`)
- Subdomain identification (`acme.yoursaas.com`)
- Domain OR subdomain identification (both of the above)
- Path identification (`yoursaas.com/acme/dashboard`)
- Request data identification (`yoursaas.com/users?tenant_id=acme` — or using request headers)

However, **you're free to write additional tenant resolvers.**

All of the identification methods mentioned above come with their own middleware. You can read more about each identification method below.

## Domain identification {#domain-identification}

To use this identification method, make sure your tenant model uses the `HasDomains` trait.

Be sure to read the [Domains]({{ $page->link('domains') }}) page of the documentation.

The relationship is `Tenant hasMany Domain`. Store the hostnames in the `domain` column of the `domains` table.

This identification method comes with the `Stancl\Tenancy\Middleware\InitializeTenancyByDomain` middleware.

## Subdomain identification {#subdomain-identification}

This is the exact same as domain identification, except you store the subdomains in the `domain` column of the `domains` table.

The benefit of this approach rather than storing the subdomain's full hostname in the `domain` column is that you can use this subdomain on **any** of your central domains.

The middleware for this method is `Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain`.

## Combined domain/subdomain identification {#combined-domain-subdomain-identification}

If you'd like to use subdomains and domains at the same time, use the `Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain` middleware.

Records that contain **dots** in the `domain` column will be treated as domains/hostnames (eg. `foo.bar.com`) and records that don't contain any dots will be treated as subdomains (eg. `foo`).

## Path identification {#path-identification}

Some applications will want to use a single domain, but use paths to identify the tenant. This would be when you want customers to use your branded product rather than giving them a whitelabel product that they can use on their own domains.

To do this, use the `Stancl\Tenancy\Middleware\InitializeTenancyByPath` middleware **and make sure your routes are prefixes with `/{tenant}`**.

```php
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;

Route::group([
    'prefix' => '/{tenant}',
    'middleware' => [InitializeTenancyByPath::class],
], function () {
    Route::get('/foo', 'FooController@index');
});
```

If you'd like to customize the name of the argument (e.g. use `team` instead of `tenant`, look into the middleware for the public static property).

## Request data identification {#request-data-identification}

You might want to identify tenants based on request data (headers or query parameters). Applications with SPA frontends and API backends may want to use this approach.

The middleware for this identification method is `Stancl\Tenancy\Middleware\InitializeTenancyByRequestData`.

You may customize what this middleware looks for in the request. By default, it will look for the `X-Tenant` header. If the header is not found, it will look for the `tenant` query parameter.

If you'd like to use a different header, change the static property:

```php
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;

InitializeTenancyByRequestData::$header = 'X-Team';
```

If you'd like to only use the query parameter identification, set the header static property to null:

```php
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;

InitializeTenancyByRequestData::$header = null;
```

If you'd like to disable the query parameter identification and only ever use the header, set the static property for the parameter to null:

```php
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;

InitializeTenancyByRequestData::$queryParameter = null;
```

## Manually identifying tenants {#manually-identifying-tenants}

See the [manual initialization page]({{ $page->link('manual-initialization') }}) to see how to identify tenants manually.

## Customizing onFail logic {#customizing-onfail-logic}

Each identification middleware has a [static `$onFail` property]({{ $page->link('configuration/#static-properties') }}) that can be used to customize the behavior that should happen when a tenant couldn't be identified.

```php
\Stancl\Tenancy\Middleware\InitializeTenancyByDomain::$onFail = function ($exception, $request, $next) {
    return redirect('https://my-central-domain.com/');
};
```
