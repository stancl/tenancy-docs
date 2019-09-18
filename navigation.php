<?php

return [
    'Getting Started' => [
        'url'      => 'getting-started',
        'children' => [
            'Installation'             => 'installation',
            'Storage Drivers'          => 'storage-drivers',
            'This Package vs Others'   => 'difference-between-this-package-and-others',
            'Configuration'            => 'configuration',
        ],
    ],
    'Usage' => [
        'url'      => 'usage',
        'children' => [
            'Creating Tenants' => 'creating-tenants',
            'Tenant Routes'    => 'tenant-routes',
            'Tenant Storage'   => 'tenant-storage',
            'Tenant Manager'   => 'tenant-manager',
            'Console Commands' => 'console-commands',
        ],
    ],
    'Digging Deeper' => [
        'url'      => 'digging-deeper',
        'children' => [
            'Middleware Configuration'   => 'middleware-configuration',
            'Custom Database Names'      => 'custom-database-names',
            'Filesystem Tenancy'         => 'filesystem-tenancy',
            'Jobs & Queues'              => 'jobs-queues',
            'Event System'               => 'event-system',
            'Tenancy Initialization'     => 'tenancy-initialization',
            'Application Testing'        => 'application-testing',
            'Writing Storage Drivers'    => 'writing-storage-drivers',
            'Development'                => 'development',
        ],
    ],
    'Integrations' => [
        'url'      => 'integrations',
        'children' => [
            'Telescope' => 'telescope',
            'Horizon'   => 'horizon',
        ],
    ],
    'Tips' => [
        'children' => [
            'HTTPS Certificates' => 'https-certificates',
            'Misc'               => 'misc-tips',
        ],
    ],
    'Stay Updated' => 'stay-updated',
    'GitHub'       => 'https://github.com/stancl/tenancy',
];
