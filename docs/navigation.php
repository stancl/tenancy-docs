<?php

return [
    'v1' => [
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
    ],
    'v2' => [
        'Upgrading from 1.x' => 'upgrading',
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
                'Tenant Migrations'=> 'tenant-migrations',
                'Tenant Routes'    => 'tenant-routes',
                'Tenant Storage'   => 'tenant-storage',
                'Tenant Manager'   => 'tenant-manager',
                'Console Commands' => 'console-commands',
            ],
        ],
        'Digging Deeper' => [
            'url'      => 'digging-deeper',
            'children' => [
                'Tenants'                    => 'tenants',
                'Central App'                => 'central-app',
                'Universal Routes'           => 'universal-routes',
                'Cached Tenant Lookup'      => 'cached-tenant-lookup',
                'PostgreSQL schema separation' => 'postgres-schema-separation',
                'Custom Database Names'      => 'custom-database-names',
                'Custom DB Connections'      => 'custom-db-connections',
                'Disabling DB Creation'      => 'disabling-db-creation',
                'Filesystem Tenancy'         => 'filesystem-tenancy',
                'Jobs & Queues'              => 'jobs-queues',
                'Hooks / Events'             => 'hooks',
                'Tenancy Initialization'     => 'tenancy-initialization',
                'Tenancy Bootstrappers'      => 'tenancy-bootstrappers',
                'Application Testing'        => 'application-testing',
                'Tenant-Aware Commands'      => 'tenant-aware-commands',
                'Middleware Configuration'   => 'middleware-configuration',
                'Writing Storage Drivers'    => 'writing-storage-drivers',
            ],
        ],
        'Optional Features' => [
            'url' => 'features',
            'children' => [
                'Tenant Config' => 'features/tenant-config',
                'Timestamps' => 'features/timestamps',
                'Tenant Redirect' => 'features/tenant-redirect',
            ],
        ],
        'Integrations' => [
            'url'      => 'integrations',
            'children' => [
                'Spatie Packages' => 'spatie',
                'Horizon'   => 'horizon',
                'Passport'   => 'passport',
                'Nova'   => 'nova',
                'Telescope' => 'telescope',
                'Livewire' => 'livewire',
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
        'Tutorial'     => 'https://samuelstancl.me/blog/make-your-laravel-app-multi-tenant-without-changing-a-line-of-code/',
    ],
];
