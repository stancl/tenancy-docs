<?php

return [
    'baseUrl'         => '',
    'production'      => false,
    'siteName'        => 'stancl/tenancy documentation',
    'siteDescription' => 'A Laravel multi-database tenancy package that respects your code.',

    // key => display name
    'versions' => [
        'v1' => '1.x',
        'v2' => '2.x (beta)',
    ],
    'defaultVersion' => 'v1',
    'prettyUrls' => true,

    'version' => function ($page) {
        return explode('/', $page->getPath())[1];
    },

    'link' => function ($page, $path) {
        return $page->baseUrl . '/' . $page->version() . '/' . $path . ($page->prettyUrls ? '' : '.html');
    },

    // Algolia DocSearch credentials
    'docsearchApiKey'    => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/'.trimPath($path);
    },
    'isUrl' => function ($page, $path) {
        return starts_with($path, 'http');
    },
];
