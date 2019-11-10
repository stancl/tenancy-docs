---
title: Timestamps
description: Timestamps
extends: _layouts.documentation
section: content
---

# Timestamps {#timestamps-redirect}

> To enable this feature, uncomment the `Stancl\Tenancy\Features\Timestamps::class` line in your `tenancy.features` config.

This `Feature` adds the following timestamps into the tenant storage:

- `created_at`
- `updated_at`
- `deleted_at` - for soft deletes
