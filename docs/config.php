<?php

return [
    'baseUrl'         => '',
    'production'      => false,
    'siteName'        => 'Tenancy for Laravel documentation',
    'siteDescription' => 'stancl/tenancy — An automatic multi-tenancy package for Laravel.',

    // key => display name
    'versions' => [
        'v1' => '1.x',
        'v2' => '2.x',
    ],
    'defaultVersion' => 'v2',
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
        return (starts_with($path, 'http://') || starts_with($path, 'https://')) ? $path : '/'.trimPath($path);
    },
    'isUrl' => function ($page, $path) {
        return starts_with($path, 'http://') || starts_with($path, 'https://');
    },
];
