---
title: Tenant Redirect
description: Tenant Redirect
extends: _layouts.documentation
section: content
---

# Tenant Redirect {#tenant-redirect}

> To enable this feature, uncomment the `Stancl\Tenancy\Features\TenantRedirect::class` line in your `tenancy.features` config.

A customer has signed up on your website, you have created a new tenant and now you want to redirect the customer to their website. You can use the `tenant()` method on Redirect, like this:

```php
// tenant sign up controller
return redirect()->route('dashboard')->tenant($domain);
```