---
title: Filesystem Tenancy
description: Filesystem Tenancy..
extends: _layouts.documentation
section: content
---

# Filesystem Tenancy {#filesystem-tenancy}

> Note: It's important to differentiate between storage_path() and the Storage facade. The Storage facade is what you use to put files into storage, i.e. `Storage::disk('local')->put()`.  `storage_path()` is used to get the path to the storage directory.

The `storage_path()` will be suffixed with a directory named `config('tenancy.filesystem.suffix_base') . $id`.

The root of each disk listed in `tenancy.filesystem.disks` will be suffixed with `config('tenancy.filesystem.suffix_base') . $id`.

**However, this alone would cause unwanted behavior.** It would work for S3 and similar disks, but for local disks Laravel does its own suffixing. For local storage we need the second of these examples:
```
/path_to_your_application/storage/app/tenant1e22e620-1cb8-11e9-93b6-8d1b78ac0bcd/
/path_to_your_application/storage/tenant1e22e620-1cb8-11e9-93b6-8d1b78ac0bcd/app/
```
Why? Because `storage_path()` returns:

`/path_to_your_application/storage/tenant1e22e620-1cb8-11e9-93b6-8d1b78ac0bcd/`

so Laravel's `storage_path('app')` means appending `app` to that.

That's what the `root_override` section is for. `%storage_path%` gets replaced by `storage_path()` *after* tenancy has been initialized. The roots of disks listed in the `root_override` section of the config will be replaced accordingly. All other disks will be simply suffixed with `tenancy.filesystem.suffix_base` + the tenant id.

Since `storage_path()` will be suffixed, your folder structure will look like this:

![The folder structure](https://i.imgur.com/GAXQOnN.png)

If you write to these directories, you will need to create them after you create the tenant. See the docs for [PHP's mkdir](http://php.net/function.mkdir).

Logs will be saved to `storage/logs` regardless of any changes to `storage_path()`, and regardless of tenant.

## Assets {#assets}

Laravel's `asset()` helper has two different paths of execution:

- If `config('app.asset_url')` has been set, it will simply append `tenant$id` to the end of the configured asset URL. This is useful if you use Laravel Vapor. Vapor sets the asset URL to something like `https://abcdefghijkl.cloudfrount.net/123-456-789`. That is the root for your assets. This package will append that with something like `tenant1e22e620-1cb8-11e9-93b6-8d1b78ac0bcd`.
- If `config('app.asset_url')` is null, as it is by default, the helper will return a URL (`/tenancy/assets/...`) to a controller provided by this package. That controller returns a file response from `storage_path("app/public/$path")`. This means that you need to store your assets in the public directory.

> Note: In 1.x, the `asset()` helper was not tenant-aware, and there was a `tenant_asset()` helper that followed the second option in the list above (a link to a controller). For backwards compatibility, that helper remains intact.

> If you have some non-tenant-specific assets, you may use the package's `global_asset()` helper.

Note that all tenant assets have to be in the `app/public/` subdirectory of the tenant's storage directory, as shown in the image above.

This is what the backend of `tenant_asset()` (and `asset()` when no asset URL is configured) returns:
```php
// TenantAssetsController
return response()->file(storage_path('app/public/' . $path));
```

With default filesystem configuration, these two commands are equivalent:

```php
Storage::disk('public')->put($filename, $data);
Storage::disk('local')->put("public/$filename", $data);
```

If you want to store something globally, simply create a new disk and *don't* add it to the `tenancy.filesystem.disks` config.
