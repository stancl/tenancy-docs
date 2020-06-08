<?php

return [
    'v1' => [
        'Getting Started' => [
            'url' => 'getting-started',
            'children' => [
                'Installation' => 'installation',
                'Storage Drivers' => 'storage-drivers',
                'This Package vs Others' => 'difference-between-this-package-and-others',
                'Configuration' => 'configuration',
            ],
        ],
        'Usage' => [
            'url' => 'usage',
            'children' => [
                'Creating Tenants' => 'creating-tenants',
                'Tenant Routes' => 'tenant-routes',
                'Tenant Storage' => 'tenant-storage',
                'Tenant Manager' => 'tenant-manager',
                'Console Commands' => 'console-commands',
            ],
        ],
        'Digging Deeper' => [
            'url' => 'digging-deeper',
            'children' => [
                'Middleware Configuration' => 'middleware-configuration',
                'Custom Database Names' => 'custom-database-names',
                'Filesystem Tenancy' => 'filesystem-tenancy',
                'Jobs & Queues' => 'jobs-queues',
                'Event System' => 'event-system',
                'Tenancy Initialization' => 'tenancy-initialization',
                'Application Testing' => 'application-testing',
                'Writing Storage Drivers' => 'writing-storage-drivers',
                'Development' => 'development',
            ],
        ],
        'Integrations' => [
            'url' => 'integrations',
            'children' => [
                'Telescope' => 'telescope',
                'Horizon' => 'horizon',
            ],
        ],
        'Tips' => [
            'children' => [
                'HTTPS Certificates' => 'https-certificates',
                'Misc' => 'misc-tips',
            ],
        ],
        'Stay Updated' => 'stay-updated',
        'GitHub' => 'https://github.com/stancl/tenancy',
    ],
    'v2' => [
        'Upgrading from 1.x' => 'upgrading',
        'Getting Started' => [
            'url' => 'getting-started',
            'children' => [
                'Installation' => 'installation',
                'Storage Drivers' => 'storage-drivers',
                'This Package vs Others' => 'difference-between-this-package-and-others',
                'Configuration' => 'configuration',
            ],
        ],
        'Usage' => [
            'url' => 'usage',
            'children' => [
                'Creating Tenants' => 'creating-tenants',
                'Tenant Migrations'=> 'tenant-migrations',
                'Tenant Routes' => 'tenant-routes',
                'Tenant Storage' => 'tenant-storage',
                'Tenant Manager' => 'tenant-manager',
                'Console Commands' => 'console-commands',
            ],
        ],
        'Digging Deeper' => [
            'url' => 'digging-deeper',
            'children' => [
                'Tenants' => 'tenants',
                'Central App' => 'central-app',
                'Universal Routes' => 'universal-routes',
                'Cached Tenant Lookup' => 'cached-tenant-lookup',
                'PostgreSQL schema separation' => 'postgres-schema-separation',
                'Custom Database Names' => 'custom-database-names',
                'Custom DB Connections' => 'custom-db-connections',
                'Disabling DB Creation' => 'disabling-db-creation',
                'Filesystem Tenancy' => 'filesystem-tenancy',
                'Jobs & Queues' => 'jobs-queues',
                'Hooks / Events' => 'hooks',
                'Tenancy Initialization' => 'tenancy-initialization',
                'Tenancy Bootstrappers' => 'tenancy-bootstrappers',
                'Application Testing' => 'application-testing',
                'Tenant-Aware Commands' => 'tenant-aware-commands',
                'Middleware Configuration' => 'middleware-configuration',
                'Writing Storage Drivers' => 'writing-storage-drivers',
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
            'url' => 'docs/integrations',
            'children' => [
                'Spatie Packages' => 'spatie',
                'Horizon' => 'horizon',
                'Passport' => 'passport',
                'Nova' => 'nova',
                'Telescope' => 'telescope',
                'Livewire' => 'livewire',
            ],
        ],
        'Tips' => [
            'children' => [
                'HTTPS Certificates' => 'https-certificates',
                'Misc' => 'misc-tips',
            ],
        ],
        'Stay Updated' => 'stay-updated',
        'GitHub' => 'https://github.com/stancl/tenancy',
        'Tutorial' => 'https://samuelstancl.me/blog/make-your-laravel-app-multi-tenant-without-changing-a-line-of-code/',
    ],
    'v3' => [
        'SaaS boilerplate' => 'https://tenancyforlaravel.com/saas-boilerplate/',
        'GitHub' => 'https://github.com/stancl/tenancy',
        'Donate' => 'https://tenancyforlaravel.com/donate',
        'Upgrading from 2.x' => 'upgrading',

        'Introduction' => [
            'children' => [
                'Introduction' => 'introduction',
                'Quickstart' => 'quickstart',
                'Installation' => 'installation',
                'Configuration' => 'configuration',
                'Compared to other packages' => 'package-comparison',
            ],
        ],

        'Concepts' => [
            'children' => [
                'The two applications' => 'the-two-applications',
                'Tenants' => 'tenants',
                'Domains' => 'domains',
                'Event system' => 'event-system',
                'Routes' => 'routes',
                'Tenancy bootstrappers' => 'tenancy-bootstrappers',
                'Feature classes' => 'feature-classes',
            ],
        ],

        'Tenancy modes' => [
            'children' => [
                'Automatic mode' => 'automatic-mode',
                'Manual mode' => 'manual-mode',
            ],
        ],

        'Single-database tenancy' => [
            'children' => [
                'Single-database tenancy' => 'single-database-tenancy',
            ],
        ],

        'Identifying tenants' => [
            'children' => [
                'Tenant identification' => 'tenant-identification',
                'Early identification' => 'early-identification',
            ],
        ],

        'Multi-database tenancy' => [
            'children' => [
                'Multi-database tenancy' => 'multi-database-tenancy',
                'Migrations' => 'migrations',
                'Customizing databases' => 'customizing-databases',
                'Synced resources between tenants' => 'synced-resources-between-tenants',
                'Session scoping' => 'session-scoping',
                'Queues' => 'queues',
            ],
        ],

        'Digging deeper' => [
            'children' => [
                'Manual initialization' => 'manual-initialization',
                'Testing' => 'testing',
                'Integrating with other packages' => 'integrating',
                'Console commands' => 'console-commands',
                'Cached lookup' => 'cached-lookup',
            ],
        ],
    ],
];
