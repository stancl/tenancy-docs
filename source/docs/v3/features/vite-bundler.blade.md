---
title: Vite bundler
extends: _layouts.documentation
section: content
---

# Vite bundler {#vite-bundler}

Enabling the ViteBundler feature makes Vite generate the correct asset paths using the `global_asset()` helper. To enable the feature, uncomment `Stancl\Tenancy\Features\ViteBundler::class` in tenancy config's `features`.

```php
'features' => [
    // [...]
    Stancl\Tenancy\Features\ViteBundler::class,
],
```
