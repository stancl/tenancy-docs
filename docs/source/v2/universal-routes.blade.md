---
title: Universal Routes
description: Universal Routes
extends: _layouts.documentation
section: content
---

# Universal Routes {#universal-routes}

You may want to use some routes, such as `Auth::routes()`, in both your tenant app and your central app. To do this, use the `universal` middleware group on the route(s).

Another example of when you might want to do this is if you want to use [Laravel Nova in the tenant app]({{ $page->link('nova') }}) as well as in the central app.
