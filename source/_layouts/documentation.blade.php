<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->title }} | {{ $page->siteName }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>
        <meta property="twitter:image" content="https://tenancyforlaravel.com/assets/img/logo.png"/>
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:site" content="@samuelstancl">
        <meta property="twitter:title" content="{{ ($title ?? null) ? $title . ' | Tenancy for Laravel' : 'Tenancy for Laravel' }}">

        <meta name="theme-color" content="#5850EC">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        <meta name="docsearch:language" content="en" />
        <meta name="docsearch:version" content="{{ $page->version() }}" />

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <title>{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">

        @stack('meta')

        @if ($page->production)
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168455954-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-168455954-1');
            </script>
        @endif
        <link href="https://fonts.googleapis.com/css?family=Fira+Code&display=swap" rel="stylesheet">
        <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        <script src="{{ mix('js/turbolinks.js', 'assets/build') }}"></script>

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif

        <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="p-2">
            @include('_partials.header-docs')
    
            <main role="main" class="">
                <section class="px-6 py-4">
                    <div class="grid grid-cols-8 gap-4">
                        <nav id="js-nav-menu" class="nav-menu md:block md:col-span-2 hidden col-span-8 font-semibold text-indigo-700">
                            @include('_nav.menu', ['items' => $page->navigation[$page->version()]])
                        </nav>
                        <div class="lg:pl-4 md:col-span-6 lg:col-span-4 col-span-8 pb-16 break-words" v-pre>
                            <div class="markdown">
                                @if($page->version() !== $page->defaultVersion)
                                    <div class="bg-yellow-50 border border-yellow-100 text-yellow-800 w-full px-4 py-3 rounded-lg">
                                        You're looking at {{ $page->version() }} documentation. The current version is {{ $page->defaultVersion }}.
                                        You can find the docs for the current version <a href="/docs/{{ $page->defaultVersion }}">here</a>.
                                    </div>
                                @endif

                                @yield('content')
                            </div>
                            <div class="flex justify-end">
                                <a href="{{ $page->editLink() }}" data-turbolinks="false"
                                   class="inline-flex text-base font-medium leading-6 hover:text-white text-gray-100 whitespace-no-wrap transition duration-150 ease-in-out">
                                    <span class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-r-none rounded-md">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 border border-transparent rounded-l-none rounded-md">
                                        Edit on GitHub
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        @include('_partials.footer')

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js" data-turbolinks-eval="false"></script>
        @endif
        <script src="{{ $page->baseUrl . mix('js/main.js', 'assets/build') }}"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
        @stack('scripts')

    </body>
</html>
