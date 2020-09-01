---
title: Early identification
extends: _layouts.documentation
section: content
---

# Early identification {#early-identification}

A slight "gotcha" with using the automatic approach to transition the application's context based on a route middleware is that **route-level middleware is executed after controller constructors.**

The implication of this is if you're using dependency injection to inject some services in the controller constructors, **they will read from the central context**, because route-level middleware hasn't initialized tenancy yet.

There are two ways to solve it, the former of which is preferable.

## Not using constructor DI {#not-using-constructor-di}

You can inject dependencies in route **actions**, meaning: If you have a route that binds a `Post` model, you can still inject dependencies like this:

```php
// Note that this is sort-of pseudocode. Notice the route action DI
// and just skim the rest :)

Route::get('/post/{post}/edit', 'PostController@edit');

class PostController
{
    public function edit(Request $request, Post $post, Cloudinary $cloudinary)
    {
        if ($request->has('image')) {
            $post->image_url = $cloudinary->store($request->file('image'));
        }
    }
}
```

If you don't like that because you access some dependency from many actions, consider creating a memorized method:

```php
class PostController
{
    protected Cloudinary $cloudinary;

    protected cloudinary(): Cloudinary
    {
        // If you don't like the service location here, injecting Application
        // in the controller constructor is one thing that's 100% safe.
        return $this->cloudinary ??= app(Cloudinary::class);
    }

    public function edit(Request $request, Post $post)
    {
        if ($request->has('image')) {
            $post->image_url = $this->cloudinary()->store(
                $request->file('image')
            );
        }
    }
}
```

## Using a more complex middleware setup {#using-a-more-complex-middleware-setup}

> Note: There's a new MW in v3 for preventing access from central domains. v2 was doing this a bit differently.

The manual for implementing this will come soon, for now you can look at how 2.x does this.

In short: The `InitializeTenancy` mw is part of the global middleware stack, which doesn't have access to route information, but is executed prior to controller constructors. The `PreventAccessFromTenantDomains` mw checks that we're vising a tenant route on a tenant domain, or a central route on a central domain — and if not, it aborts the request, either by 404 or by redirecting us to a home url on the tenant domain.

Here's the logic visually:

![Early identification middleware](/assets/images/stancl_tenancy_middleware.png)

And here are the relevant files in 2.x codebase:

- [https://github.com/stancl/tenancy/blob/2.x/src/Middleware/InitializeTenancy.php](https://github.com/stancl/tenancy/blob/2.x/src/Middleware/InitializeTenancy.php)
- [https://github.com/stancl/tenancy/blob/2.x/src/Middleware/PreventAccessFromTenantDomains.php](https://github.com/stancl/tenancy/blob/2.x/src/Middleware/PreventAccessFromTenantDomains.php)
