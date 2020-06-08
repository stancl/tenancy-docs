<?php

use Illuminate\Support\Str;

return [
    'baseUrl'         => 'http://localhost:3000',
    'production'      => false,
    'siteName'        => 'Tenancy for Laravel',
    'siteDescription' => 'Automatically turn any Laravel application multi-tenant — no code changes needed. stancl/tenancy automatically switches database connections and all other things in the background, letting you leverage standard Laravel code into a full SaaS application. Most features out of all multi-tenancy packages. Single & multi-database tenancy.',

    'githubUrl' => 'https://github.com/stancl/tenancy',

    // key => display name
    'versions' => [
        'v1' => '1.x',
        'v2' => '2.x',
        'v3' => '3.x',
    ],
    'defaultVersion' => 'v3',
    'prettyUrls' => true,

    'version' => function ($page) {
        return explode('/', $page->getPath())[2];
    },

    'link' => function ($page, $path) {
        return $page->baseUrl . '/docs/' . $page->version() . '/' . $path . ($page->prettyUrls ? '' : '.html');
    },

    // Algolia DocSearch credentials
    'docsearchApiKey' => '53c5eaf88e819535d98f4a179c1802e1',
    'docsearchIndexName' => 'stancl-tenancy',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($page->version() . '/' . $path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return (Str::startsWith($path, 'http://') || Str::startsWith($path, 'https://')) ? $path : '/'.trimPath($path);
    },
    'isUrl' => function ($page, $path) {
        return Str::startsWith($path, 'http://') || Str::startsWith($path, 'https://');
    },
];
