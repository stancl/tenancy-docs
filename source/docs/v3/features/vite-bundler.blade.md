---
title: Vite bundler
extends: _layouts.documentation
section: content
---

# Vite bundler {#vite-bundler}

Enabling the `ViteBundler` feature makes Vite generate correct asset paths by using the `global_asset()` helper instead of the default `asset()` helper.

To enable the feature, uncomment `Stancl\Tenancy\Features\ViteBundler::class` in the `features` section of the tenancy config:

```php
'features' => [
    // [...]
    Stancl\Tenancy\Features\ViteBundler::class,
],
```
