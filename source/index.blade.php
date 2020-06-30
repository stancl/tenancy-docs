@extends('_layouts.master')

@section('content')
<div class="max-w-screen-xl px-4 mx-auto mt-8 sm:mt-12 sm:px-6 md:mt-20 xl:mt-24">
  <div class="lg:grid lg:grid-cols-12 lg:gap-8">
    <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
      <div class="text-sm font-semibold tracking-wide text-gray-500 uppercase sm:text-base lg:text-sm xl:text-base">
        New version 3
      </div>
      <h2
      class="mt-1 text-4xl font-extrabold leading-10 tracking-tight text-gray-900 sm:leading-none sm:text-6xl lg:text-5xl xl:text-6xl">
      Tenancy for Laravel
      <!-- <br class="hidden md:inline" />
        <span class="">is the good stuff</span> -->
      </h2>
      <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
        A flexible multi-tenancy package for Laravel. Single &amp; multi-database tenancy, automatic &amp; manual mode, event-based architecture. Integrates perfectly with other packages.
      </p>
      <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
        <div class="rounded-md shadow">
          <a href="/docs"
          class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline md:py-4 md:text-lg md:px-10">
          Documentation
        </a>
      </div>
      <div class="mt-3 sm:mt-0 sm:ml-3">
        <a href="/docs/v3/quickstart/"
        class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border border-transparent rounded-md hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 md:py-4 md:text-lg md:px-10">
        Tutorial
      </a>
    </div>
  </div>
</div>
<div
class="relative mt-12 sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
<svg
class="absolute top-0 hidden origin-top transform scale-75 -translate-x-1/2 -translate-y-8 left-1/2 sm:scale-100 lg:hidden"
width="640" height="784" fill="none" viewBox="0 0 640 784">
<defs>
  <pattern id="4f4f415c-a0e9-44c2-9601-6ded5a34a13e" x="118" y="0" width="20" height="20"
  patternUnits="userSpaceOnUse">
  <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
</pattern>
</defs>
<rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor" />
<rect x="118" width="404" height="784" fill="url(#4f4f415c-a0e9-44c2-9601-6ded5a34a13e)" />
</svg>
<div class="relative justify-end hidden w-full lg:flex">
  <div class="flex justify-end inline-block p-8 pr-8 text-base leading-relaxed text-blue-400 bg-indigo-900 rounded-lg shadow-lg xl:text-lg xl:pr-16">
    <pre>
<span class="text-blue-100">// Create a tenant</span>
$tenant = Tenant::create();
$tenant-&gt;createDomain([
'domain' => 'acme.com',
]);

<span class="text-blue-100">// Write your app like you're used to</span>
Order::where('status', 'shipped')-&gt;get();
Cache::get('order_count');
asset('logo.png');
dispatch(new SendOrderCreatedMail);</pre>
  </div>
</div>
</div>
</div>
</div>

<div class="py-16 mt-16 overflow-hidden bg-gray-50 lg:py-24">
  <div class="relative max-w-xl px-4 mx-auto sm:px-6 lg:px-8 lg:max-w-screen-xl">
    <svg class="absolute hidden transform -translate-x-1/2 lg:hidden left-full -translate-y-1/4" width="404" height="784"
    fill="none" viewBox="0 0 404 784">
    <defs>
      <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20"
      patternUnits="userSpaceOnUse">
      <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
    </pattern>
  </defs>
  <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)"></rect>
</svg>

<div class="relative">
  <h3 class="text-3xl font-extrabold leading-8 tracking-tight text-center text-gray-900 sm:text-4xl sm:leading-10">
    A package that fits your needs
  </h3>
  <p class="max-w-3xl mx-auto mt-4 text-xl leading-7 text-center text-gray-500">
    <strong class="font-medium">stancl/tenancy</strong> is a flexible multi-tenancy Laravel package that comes with <strong class="font-medium">lots</strong> of features out-of-the-box and doesn't stand in your way when you need anything custom.
  </p>
</div>

<div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
  <div class="relative">
    <h4 class="text-2xl font-extrabold leading-8 tracking-tight text-gray-900 sm:text-3xl sm:leading-9">
      Automatic tenancy
    </h4>
    <p class="mt-3 text-lg leading-7 text-gray-600">
      Instead of forcing you to change how you write your code, the package by default bootstraps tenancy automatically, in the background. Database connections are switched, caches are separated, filesystems are prefixed, etc.
    </p>
    
    <ul class="mt-10">
      <li>
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
              <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
          </div>
        </div>
        <div class="ml-4">
          <h5 class="text-lg font-medium leading-6 text-gray-900">Automatic data separation</h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Out of the box, the package makes the following things tenant-aware: databases, caches, filesystems, queues, redis stores. This means that if you've already written your app and are looking to make it multi-tenant, <strong>you don't have to change anything!</strong>
          </p>
        </div>
      </div>
    </li>
    <li class="mt-10">
      <div class="flex">
        <div class="flex-shrink-0">
          <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
          </svg>
        </div>
      </div>
      <div class="ml-4">
        <h5 class="text-lg font-medium leading-6 text-gray-900">Integrates with other packages</h5>
        <p class="mt-2 text-base leading-6 text-gray-600">
          Since the automatic mode changes the <em>default</em> database connection, most other packages will use this connection too. This means that you can do awesome things such as <strong>using Laravel Nova inside the tenant application</strong> to manage the tenant's resources.
        </p>
      </div>
    </div>
  </li>
  <li class="mt-10">
    <div class="flex">
      <div class="flex-shrink-0">
        <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
          <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        </div>
      </div>
      <div class="ml-4">
        <h5 class="text-lg font-medium leading-6 text-gray-900">Fully testable</h5>
        <p class="mt-2 text-base leading-6 text-gray-600">
          Many other tenancy packages have a terrible track record when it comes to testability. We find that unacceptable. <strong>With this package, you can test everything.</strong> The central application, the tenant application, and everything in between &mdash; including the tenant registration flow.
        </p>
      </div>
    </div>
  </li>
</ul>
</div>

<div class="relative mt-10 -mx-4 lg:mt-0">
  <svg class="absolute hidden transform -translate-x-1/2 translate-y-16 left-1/2 lg:hidden" width="784" height="404"
  fill="none" viewBox="0 0 784 404">
  <defs>
    <pattern id="ca9667ae-9f92-4be7-abcb-9e3d727f2941" x="0" y="0" width="20" height="20"
    patternUnits="userSpaceOnUse">
    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
  </pattern>
</defs>
<rect width="784" height="404" fill="url(#ca9667ae-9f92-4be7-abcb-9e3d727f2941)"></rect>
</svg>
<img class="relative mx-auto rounded-lg" width="490" src="/assets/images/tenant_controller.png" alt="Tenant controller">
</div>
</div>

<svg class="absolute hidden transform translate-x-1/2 translate-y-12 lg:hidden right-full" width="404" height="784"
fill="none" viewBox="0 0 404 784">
<defs>
  <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20"
  patternUnits="userSpaceOnUse">
  <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
</pattern>
</defs>
<rect width="404" height="784" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"></rect>
</svg>

<div class="relative mt-12 sm:mt-16 lg:mt-24">
  <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
    <div class="lg:col-start-2">
      <h4 class="text-2xl font-extrabold leading-8 tracking-tight text-gray-900 sm:text-3xl sm:leading-9">
        Extreme flexibility
      </h4>
      <p class="mt-3 text-lg leading-7 text-gray-600">
        Version 3 is heavily focused on flexibility, but without sacrificing features. Even though everything is customizable, the defaults will likely suit you for the large part.
      </p>
      
      <ul class="mt-10">
        <li>
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
                <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
            </div>
          </div>
          <div class="ml-4">
            <h5 class="text-lg font-medium leading-6 text-gray-900">Event-based architecture</h5>
            <p class="mt-2 text-base leading-6 text-gray-600">
              All of the tenancy bootstrapping logic, post-tenant-creation logic, and most other things, happen as a result of events firing. You can customize every single bit.
            </p>
          </div>
        </div>
      </li>
      <li class="mt-10">
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
              <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
          </div>
        </div>
        <div class="ml-4">
          <h5 class="text-lg font-medium leading-6 text-gray-900">Single or multi-database tenancy</h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Don't want to use the database-per-tenant approach? No problem, we provide you with model traits for scoping models to the current tenant, <strong>including models that aren't related to the tenant directly.</strong>
          </p>
        </div>
      </div>
    </li>
    <li class="mt-10">
      <div class="flex">
        <div class="flex-shrink-0">
          <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
        </div>
      </div>
      <div class="ml-4">
        <h5 class="text-lg font-medium leading-6 text-gray-900">Manual tenancy</h5>
        <p class="mt-2 text-base leading-6 text-gray-600">
          Prefer specifying database connections instead of changing the default connection? No problem, we have model
          traits prepared.
        </p>
      </div>
    </div>
  </li>
</ul>
</div>

<div class="relative mt-10 -mx-4 lg:mt-0 lg:col-start-1">
  <svg class="absolute hidden transform -translate-x-1/2 translate-y-16 left-1/2 lg:hidden" width="784" height="404"
  fill="none" viewBox="0 0 784 404">
  <defs>
    <pattern id="e80155a9-dfde-425a-b5ea-1f6fadd20131" x="0" y="0" width="20" height="20"
    patternUnits="userSpaceOnUse">
    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
  </pattern>
</defs>
<rect width="784" height="404" fill="url(#e80155a9-dfde-425a-b5ea-1f6fadd20131)"></rect>
</svg>
<img class="relative mx-auto rounded-lg" width="490" src="/assets/images/tenancy_events.png" alt="Tenancy events">
</div>
</div>
</div>
</div>
</div>

<div class="py-12 bg-gray-50">
  <div class="max-w-xl px-4 mx-auto sm:px-6 lg:max-w-screen-xl lg:px-8">
    <div>
      <h3
      class="text-3xl font-extrabold leading-8 tracking-tight text-center text-gray-900 sm:text-4xl sm:leading-10">
      Packed with features
    </h3>
    <p class="max-w-3xl mx-auto mt-4 text-xl leading-7 text-center text-gray-500">
      This package has the most features out of all multi-tenancy packages for Laravel.
    </p>
  </div>
  
  <div class="mt-12 lg:grid lg:grid-cols-3 lg:gap-8">
    <div>
      <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
        <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
      </div>
      <div class="mt-5">
        <h5 class="text-lg font-medium leading-6 text-gray-900">Shared users between tenants</h5>
        <p class="mt-2 text-base leading-6 text-gray-600">
          Need to use the database-per-tenant approach but also need to have users that belong to multiple tenants? We've got you covered. Our Resource Syncing feature lets you synchronize any database resources between specific tenants' databases.
        </p>
      </div>
    </div>
    <div class="mt-10 lg:mt-0">
      <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
        <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      </div>
      <div class="mt-5">
        <h5 class="text-lg font-medium leading-6 text-gray-900">User impersonation</h5>
        <p class="mt-2 text-base leading-6 text-gray-600">
          Want to impersonate a user inside a tenant's database from the central context? Or even from another tenant's context? Just enable the user impersonation feature in the config.
        </p>
      </div>
    </div>
    <div class="mt-10 lg:mt-0">
      <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
        <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
      </div>
      <div class="mt-5">
        <h5 class="text-lg font-medium leading-6 text-gray-900">Works with any database</h5>
        <p class="mt-2 text-base leading-6 text-gray-600">
          Need to separate tenant databases on MySQL/PostgreSQL/SQLite? No problem. Or maybe you want to use PostgreSQL schemas instead? We can do that too.
        </p>
      </div>
    </div>
  </div>
</div>
</div>

<div class="bg-white">
  <div class="max-w-screen-xl px-4 py-12 mx-auto text-center sm:px-6 lg:py-16 lg:px-8">
    <h2 class="text-3xl font-extrabold leading-normal tracking-tight text-center text-gray-900 sm:text-4xl">
      <p>
        Ready to try it?
      </p>
      <p>
        <span class="text-indigo-600">Read the documentation.</span>
      </p>
    </h2>
    <div class="flex justify-center mt-8">
      <div class="inline-flex rounded-md shadow">
        <a href="/docs"
        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
        Documentation
      </a>
    </div>
    <div class="inline-flex ml-3">
      <a href="/docs/v3/quickstart/"
      class="inline-flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border border-transparent rounded-md hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300">
      Tutorial
    </a>
  </div>
</div>
</div>
</div>

<div class="bg-gray-50">
  <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:py-16 lg:px-8">
    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
      <div>
        <h2 class="text-3xl font-extrabold leading-9 text-gray-900 sm:text-4xl sm:leading-10">
          Awesome integration with other packages
        </h2>
        <p class="max-w-3xl mt-3 text-lg leading-7 text-gray-600">
          Apart from saving you a huge amount of time, the automatic mode has another great side effect: it lets you integrate almost any other package with no issues. No more model traits!
        </p>
        <div class="mt-8 sm:flex">
          <div class="rounded-md shadow">
            <a href="/docs"
            class="flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
            Documentation
          </a>
        </div>
        <div class="mt-3 sm:mt-0 sm:ml-3">
          <a href="/docs/v3/quickstart/"
          class="flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border border-transparent rounded-md hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300">
          Tutorial
        </a>
      </div>
    </div>
  </div>
  <div class="mt-8 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-0 lg:grid-cols-2">
    <div class="flex justify-center col-span-1 px-8 py-8 bg-gray-50">
      <svg class="block h-12" title="Telescope" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
        <path class="fill-current text-indigo-600" d="M0 40a39.87 39.87 0 0 1 11.72-28.28A40 40 0 1 1 0 40zm34 10a4 4 0 0 1-4-4v-2a2 2 0 1 0-4 0v2a4 4 0 0 1-4 4h-2a2 2 0 1 0 0 4h2a4 4 0 0 1 4 4v2a2 2 0 1 0 4 0v-2a4 4 0 0 1 4-4h2a2 2 0 1 0 0-4h-2zm24-24a6 6 0 0 1-6-6v-3a3 3 0 0 0-6 0v3a6 6 0 0 1-6 6h-3a3 3 0 0 0 0 6h3a6 6 0 0 1 6 6v3a3 3 0 0 0 6 0v-3a6 6 0 0 1 6-6h3a3 3 0 0 0 0-6h-3zm-4 36a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM21 28a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
        </path>
      </svg>
    </div>
    <div class="flex justify-center col-span-1 px-8 py-8 bg-gray-50">
      <svg class="block h-12" title="Laravel Vapor" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.345 9h10.55L9.618 20 4.345 9zm21.099 0h10.55l-5.276 11-5.274-11z" fill="#E9F9FD" fill-opacity=".1"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.62 20h10.549l-5.275 11L9.62 20z" fill="#25C4F2" fill-opacity=".22"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M20.169 20h10.55l-5.275 11-5.275-11z" fill="#25C4F2" fill-opacity=".2"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M20.169 20H9.619l5.275-11 5.275 11z" fill="#25C4F2" fill-opacity=".4"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M30.718 20h-10.55l5.276-11 5.274 11z" fill="#25C4F2" fill-opacity=".4"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M25.444 31h-10.55l5.275-11 5.275 11z" fill="#25C4F2" fill-opacity=".5"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M3.494 8.467A1 1 0 0 1 4.34 8h10.55a1 1 0 0 1 .902.568l4.373 9.12 4.373-9.12A1 1 0 0 1 25.44 8h10.55a1 1 0 0 1 .902 1.432L26.345 31.424a1.001 1.001 0 0 1-.905.576H14.89a1 1 0 0 1-.902-.568l-10.55-22a1 1 0 0 1 .056-.965zm21.95 2.846L29.13 19h-7.372l3.686-7.687zM5.934 10l3.686 7.687L13.306 10H5.933zm8.96 1.313L18.58 19h-7.372l3.686-7.687zM27.032 10l3.686 7.687L34.405 10h-7.373zm-1.588 18.687L21.758 21h7.372l-3.686 7.687zM23.855 30l-3.686-7.687L16.483 30h7.372zm-8.96-1.313L11.207 21h7.372l-3.686 7.687z" fill="#25C4F2"></path></svg>
    </div>
    <div class="flex justify-center col-span-1 px-8 py-8 bg-gray-50">
      <svg class="block h-12" title="Horizon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
        <path class="fill-current text-indigo-600" d="M5.26176342 26.4094389C2.04147988 23.6582233 0 19.5675182 0 15c0-4.1421356 1.67893219-7.89213562 4.39339828-10.60660172C7.10786438 1.67893219 10.8578644 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15-3.716753 0-7.11777662-1.3517984-9.73823658-3.5905611zM4.03811305 15.9222506C5.70084247 14.4569342 6.87195416 12.5 10 12.5c5 0 5 5 10 5 3.1280454 0 4.2991572-1.9569336 5.961887-3.4222502C25.4934253 8.43417206 20.7645408 4 15 4 8.92486775 4 4 8.92486775 4 15c0 .3105915.01287248.6181765.03811305.9222506z"></path>
      </svg>
    </div>
    <div class="flex justify-center col-span-1 px-8 py-8 bg-gray-50">
      <img class="block h-12" src="/assets/images/spatie.png" alt="Spatie">
    </div>
    <div class="flex justify-center col-span-1 px-8 py-8 bg-gray-50">
      <svg class="block h-12" title="Nova" version="1.1" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <clipPath id="clipPath29">
            <rect y="-1.5829e-8" width="29.936" height="30.064" fill="#fff"></rect>
          </clipPath>
        </defs>
        <g clip-path="url(#clipPath29)" fill="none" fill-rule="evenodd">
          <g transform="translate(-250,-27)" class="fill-current text-indigo-600">
            <path id="Combined-Shape" d="m300.84 49.5h-8.4821v-13.34h2.854v10.84h5.6281zm10.059 0h-2.5546v-1.02c-0.6586 0.8-1.7962 1.26-3.0535 1.26-1.5368 0-3.333-1.04-3.333-3.2 0-2.28 1.7962-3.12 3.333-3.12 1.2973 0 2.4149 0.42 3.0535 1.18v-1.22c0-0.98-0.83822-1.62-2.1155-1.62-1.0178 0-1.9758 0.4-2.7741 1.14l-0.99789-1.78c1.1775-1.06 2.6943-1.52 4.2111-1.52 2.2153 0 4.231 0.88 4.231 3.66zm-4.5903-1.48c0.81827 0 1.6166-0.28 2.0357-0.84v-1.2c-0.41911-0.56-1.2174-0.86-2.0357-0.86-0.99789 0-1.8162 0.54-1.8162 1.46s0.81827 1.44 1.8162 1.44zm9.6196 1.48h-2.5346v-9.66h2.5346v1.3c0.69852-0.84 1.876-1.54 3.0735-1.54v2.48c-0.17962-0.04-0.39916-0.06-0.69852-0.06-0.83823 0-1.9559 0.48-2.375 1.1zm12.993 0h-2.5546v-1.02c-0.65861 0.8-1.7962 1.26-3.0535 1.26-1.5368 0-3.333-1.04-3.333-3.2 0-2.28 1.7962-3.12 3.333-3.12 1.2973 0 2.4149 0.42 3.0535 1.18v-1.22c0-0.98-0.83823-1.62-2.1155-1.62-1.0178 0-1.9758 0.4-2.7741 1.14l-0.99788-1.78c1.1775-1.06 2.6943-1.52 4.2111-1.52 2.2153 0 4.231 0.88 4.231 3.66zm-4.5903-1.48c0.81827 0 1.6166-0.28 2.0357-0.84v-1.2c-0.41911-0.56-1.2174-0.86-2.0357-0.86-0.99789 0-1.8162 0.54-1.8162 1.46s0.81827 1.44 1.8162 1.44zm12.314 1.48h-2.7342l-3.8718-9.66h2.7143l2.5147 6.72 2.5346-6.72h2.7143zm9.5398 0.24c-2.9338 0-5.1491-1.98-5.1491-5.08 0-2.8 2.0756-5.06 4.9894-5.06 2.8939 0 4.8298 2.16 4.8298 5.3v0.6h-7.1648c0.17962 1.18 1.1376 2.16 2.7741 2.16 0.81827 0 1.9359-0.34 2.5546-0.94l1.1376 1.68c-0.95798 0.88-2.4748 1.34-3.9716 1.34zm2.2353-6c-0.0798-0.92-0.71848-2.06-2.3949-2.06-1.5767 0-2.2552 1.1-2.355 2.06zm6.8056 5.76h-2.5346v-13.34h2.5346zm19 0h-1.5966l-7.7636-10.64v10.64h-1.6565v-13.34h1.6964l7.6638 10.42v-10.42h1.6565zm7.2646 0.24c-2.9338 0-4.7699-2.28-4.7699-5.08s1.8361-5.06 4.7699-5.06 4.7699 2.26 4.7699 5.06-1.8361 5.08-4.7699 5.08zm0-1.34c2.0557 0 3.1932-1.76 3.1932-3.74 0-1.96-1.1376-3.72-3.1932-3.72s-3.1932 1.76-3.1932 3.72c0 1.98 1.1376 3.74 3.1932 3.74zm11.416 1.1h-1.6365l-4.0115-9.66h1.6365l3.1932 7.92 3.2132-7.92h1.6166zm13.092 0h-1.4968v-1.1c-0.77836 0.88-1.896 1.34-3.1932 1.34-1.6166 0-3.3529-1.1-3.3529-3.2 0-2.18 1.7164-3.18 3.3529-3.18 1.3172 0 2.4149 0.42 3.1932 1.3v-1.74c0-1.28-1.0378-2.02-2.4348-2.02-1.1576 0-2.0956 0.4-2.9538 1.34l-0.69853-1.04c1.0378-1.08 2.2752-1.6 3.8518-1.6 2.0557 0 3.7321 0.92 3.7321 3.26zm-4.1313-0.84c1.0378 0 2.0556-0.4 2.6344-1.2v-1.84c-0.57878-0.78-1.5966-1.18-2.6344-1.18-1.417 0-2.3949 0.88-2.3949 2.1 0 1.24 0.97793 2.12 2.3949 2.12zm-126.77 3.9093c-2.7448 2.7364-6.5482 4.4307-10.751 4.4307-4.6788 0-8.8622-2.0995-11.642-5.3988 5.9527 4.9167 14.819 4.609 20.407-0.92307 3.7654-3.7277 3.7654-9.7716 0-13.499-3.7654-3.7277-9.8703-3.7277-13.636 0-1.6137 1.5976-1.6137 4.1878 0 5.7854s4.2301 1.5976 5.8439 0c0.53791-0.53253 1.41-0.53253 1.948 0 0.53791 0.53253 0.53791 1.3959 0 1.9285-2.6896 2.6627-7.0502 2.6627-9.7398 0s-2.6896-6.9797 0-9.6424c4.8412-4.7928 12.69-4.7928 17.532 0 4.8287 4.7804 4.8412 12.523 0.0376 17.319zm0.89023-20.17c-5.9527-4.9167-14.819-4.609-20.407 0.92307-3.7654 3.7277-3.7654 9.7716 0 13.499 3.7654 3.7277 9.8703 3.7277 13.636 0 1.6137-1.5976 1.6137-4.1878 0-5.7854s-4.2301-1.5976-5.8439 0c-0.53791 0.53253-1.41 0.53253-1.948 0-0.53791-0.53253-0.53791-1.3959 0-1.9285 2.6896-2.6627 7.0502-2.6627 9.7398 0s2.6896 6.9797 0 9.6424c-4.8412 4.7928-12.69 4.7928-17.532 0-4.8349-4.7866-4.8412-12.543-0.0188-17.338 2.7434-2.7254 6.539-4.412 10.733-4.412 4.6788 0 8.8622 2.0995 11.642 5.3988z"></path>
          </g>
        </g>
      </svg>
    </div>
    <div class="flex justify-center col-span-1 px-8 py-8 bg-gray-50">
      <svg class="block h-12" title="Livewire" viewBox="0 0 234 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
          <path d="M6.21428571,3.96764549 L6.21428571,13.5302735 C6.21428571,15.2463011 4.82317047,16.6374164 3.10714286,16.6374164 C1.39111524,16.6374164 -2.95438243e-14,15.2463011 -2.97539771e-14,13.5302735 L-2.9041947e-14,1.98620229 C0.579922224,0.921664997 1.24240791,1.12585387e-13 2.43677218,1.0658141e-13 C4.3810703,1.0658141e-13 5.06039718,2.44244728 6.21428571,3.96764549 Z M17.952381,4.46584612 L17.952381,19.587619 C17.952381,21.4943164 16.4066974,23.04 14.5,23.04 C12.5933026,23.04 11.047619,21.4943164 11.047619,19.587619 L11.047619,2.47273143 C11.6977478,1.21920793 12.3678531,1.0658141e-13 13.7415444,1.0658141e-13 C15.916357,1.0658141e-13 16.5084695,3.05592831 17.952381,4.46584612 Z M29,4.18831009 L29,15.1664032 C29,16.8824308 27.6088848,18.2735461 25.8928571,18.2735461 C24.1768295,18.2735461 22.7857143,16.8824308 22.7857143,15.1664032 L22.7857143,1.67316044 C23.3267006,0.747223402 23.9709031,1.0658141e-13 25.0463166,1.0658141e-13 C27.0874587,1.0658141e-13 27.7344767,2.69181961 29,4.18831009 Z" id="path-100"></path>
          <path d="M6.21428571,6.89841791 C5.66311836,6.22351571 5.01068733,5.72269617 4.06708471,5.72269617 C1.82646191,5.72269617 1.41516964,8.5465388 1.66533454e-15,9.81963771 L4.4408921e-16,-2.36068323 C2.33936437e-16,-4.07671085 1.39111524,-5.46782609 3.10714286,-5.46782609 C4.82317047,-5.46782609 6.21428571,-4.07671085 6.21428571,-2.36068323 L6.21428571,6.89841791 Z M17.952381,7.11630262 C17.3645405,6.33416295 16.6773999,5.72269617 15.6347586,5.72269617 C13.1419388,5.72269617 12.9134319,9.21799873 11.047619,10.1843478 L11.047619,4.79760812 C11.047619,2.89091077 12.5933026,1.34522717 14.5,1.34522717 C16.4066974,1.34522717 17.952381,2.89091077 17.952381,4.79760812 L17.952381,7.11630262 Z M29,6.51179 C28.521687,6.04088112 27.9545545,5.72269617 27.2024325,5.72269617 C24.7875975,5.72269617 24.497619,9.0027269 22.7857143,10.086414 L22.7857143,-0.846671395 C22.7857143,-2.56269901 24.1768295,-3.95381425 25.8928571,-3.95381425 C27.6088848,-3.95381425 29,-2.56269901 29,-0.846671395 L29,6.51179 Z" id="path-300"></path>
        </defs>
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="10.5″-iPad-Pro-Copy-6" transform="translate(-116.000000, -134.000000)">
            <g id="Group-3" transform="translate(115.000000, 136.000000)">
              <g id="Livewire" transform="translate(65.535000, 5.881000)" fill-rule="nonzero">
                <path d="M3.38593404,35.0257215 C2.53791669,35.0257215 1.83909806,34.7847546 1.28945719,34.3028134 C0.739816315,33.8208723 0.465,33.129064 0.465,32.2273676 L0.465,4.38374623 C0.465,3.4820499 0.739816315,2.79801468 1.28945719,2.33162003 C1.83909806,1.86522538 2.53791669,1.63203155 3.38593404,1.63203155 C4.23395139,1.63203155 4.94062191,1.86522538 5.50596681,2.33162003 C6.07131171,2.79801468 6.35397992,3.4820499 6.35397992,4.38374623 L6.35397992,32.2273676 C6.35397992,33.129064 6.07131171,33.8208723 5.50596681,34.3028134 C4.94062191,34.7847546 4.23395139,35.0257215 3.38593404,35.0257215 Z M15.5030991,35.0257215 C14.6550818,35.0257215 13.9562632,34.7847546 13.4066223,34.3028134 C12.8569814,33.8208723 12.5821651,33.129064 12.5821651,32.2273676 L12.5821651,14.2246241 C12.5821651,13.3229278 12.8569814,12.6388926 13.4066223,12.1724979 C13.9562632,11.7061033 14.6550818,11.4729095 15.5030991,11.4729095 C16.3511165,11.4729095 17.057787,11.7061033 17.6231319,12.1724979 C18.1884768,12.6388926 18.471145,13.3229278 18.471145,14.2246241 L18.471145,32.2273676 C18.471145,33.129064 18.1884768,33.8208723 17.6231319,34.3028134 C17.057787,34.7847546 16.3511165,35.0257215 15.5030991,35.0257215 Z M15.5030991,7.32201783 C14.4352254,7.32201783 13.5872208,7.03441211 12.9590598,6.45919204 C12.3308988,5.88397198 12.016823,5.1299786 12.016823,4.1971893 C12.016823,3.2644 12.3308988,2.51817975 12.9590598,1.95850617 C13.5872208,1.39883259 14.4352254,1.119 15.5030991,1.119 C16.5395648,1.119 17.3797175,1.39883259 18.0235826,1.95850617 C18.6674476,2.51817975 18.9893753,3.2644 18.9893753,4.1971893 C18.9893753,5.1299786 18.6752995,5.88397198 18.0471385,6.45919204 C17.4189775,7.03441211 16.5709728,7.32201783 15.5030991,7.32201783 Z M40.7644674,13.1519218 C41.0157318,12.5922482 41.3533633,12.1724993 41.777372,11.8926626 C42.2013807,11.6128258 42.6646424,11.4729095 43.1671712,11.4729095 C43.8895564,11.4729095 44.5412637,11.7138764 45.1223126,12.1958176 C45.7033615,12.6777587 45.9938816,13.2762895 45.9938816,13.991428 C45.9938816,14.3645437 45.8996589,14.7376538 45.7112106,15.1107695 L36.9955203,33.1601523 C36.7128478,33.7509188 36.3124012,34.2017602 35.7941684,34.51269 C35.2759356,34.8236198 34.7027472,34.9790823 34.0745862,34.9790823 C33.4778333,34.9790823 32.904645,34.8236198 32.3550041,34.51269 C31.8053632,34.2017602 31.3892128,33.7509188 31.1065404,33.1601523 L22.3437382,15.1107695 C22.186698,14.7998398 22.108179,14.4422759 22.108179,14.0380672 C22.108179,13.3229288 22.4144029,12.7166248 23.0268599,12.2191372 C23.6393169,11.7216495 24.3381355,11.4729095 25.1233368,11.4729095 C26.2540266,11.4729095 27.0863274,12.0170284 27.6202643,13.1052826 L34.2159218,27.5168052 L40.7644674,13.1519218 Z M67.4863027,28.4962291 C68.0202396,28.4962291 68.4520938,28.6983304 68.7818783,29.1025391 C69.1116629,29.5067478 69.2765526,30.0508667 69.2765526,30.7349122 C69.2765526,31.6987945 68.6955124,32.5071998 67.5334146,33.1601523 C66.4655409,33.7509188 65.2563491,34.2250796 63.905803,34.5826488 C62.5552568,34.9402181 61.2675461,35.119 60.0426321,35.119 C56.3364822,35.119 53.3998736,34.0618547 51.2327182,31.9475322 C49.0655627,29.8332098 47.9820013,26.9416064 47.9820013,23.2726351 C47.9820013,20.9406619 48.4531149,18.8730099 49.3953564,17.0696173 C50.3375979,15.2662246 51.6645681,13.8670617 53.3763069,12.8720864 C55.0880456,11.8771112 57.0274636,11.379631 59.194619,11.379631 C61.2675503,11.379631 63.0734861,11.8304724 64.6124805,12.7321687 C66.151475,13.633865 67.344963,14.908658 68.1929803,16.5565857 C69.0409977,18.2045135 69.465,20.1477954 69.465,22.3864897 C69.465,23.7234877 68.868256,24.3919767 67.6747501,24.3919767 L53.7767575,24.3919767 C53.9652058,26.5373921 54.5776536,28.115337 55.6141192,29.1258587 C56.6505849,30.1363805 58.1581487,30.6416337 60.1368558,30.6416337 C61.1419134,30.6416337 62.0291775,30.5172637 62.7986747,30.2685199 C63.568172,30.0197761 64.4397323,29.6777585 65.4133818,29.2424568 C66.3556233,28.7449692 67.04659,28.4962291 67.4863027,28.4962291 Z M59.3359545,15.4838834 C57.734144,15.4838834 56.4542852,15.9813636 55.4963396,16.9763388 C54.5383941,17.9713141 53.9652058,19.4015695 53.7767575,21.2671481 L64.4240332,21.2671481 C64.3612171,19.3704766 63.8901034,17.932448 63.010678,16.9530192 C62.1312526,15.9735904 60.906357,15.4838834 59.3359545,15.4838834 Z" id="Combined-Shape" fill="#4E56A6"></path>
                <path d="M105.166478,12.5404386 C105.386697,11.9639618 105.709156,11.5316107 106.133866,11.2433723 C106.558575,10.9551339 107.022602,10.8110169 107.52596,10.8110169 C108.249539,10.8110169 108.902322,11.0592185 109.484331,11.555629 C110.06634,12.0520396 110.35734,12.6685402 110.35734,13.4051495 C110.35734,13.8214938 110.278691,14.1897929 110.121391,14.5100578 L102.335098,33.1013413 C102.083419,33.7098446 101.69804,34.1742217 101.178952,34.4944866 C100.659863,34.8147515 100.085728,34.9748815 99.4565291,34.9748815 C98.8587905,34.9748815 98.3003851,34.8147515 97.7812963,34.4944866 C97.2622075,34.1742217 96.8768291,33.7098446 96.6251497,33.1013413 L91.0095806,19.3620465 L85.5827701,33.1013413 C85.3310907,33.7098446 84.9457123,34.1742217 84.4266235,34.4944866 C83.9075347,34.8147515 83.3333996,34.9748815 82.704201,34.9748815 C82.1064624,34.9748815 81.5401922,34.8147515 81.0053734,34.4944866 C80.4705546,34.1742217 80.0773114,33.7098446 79.825632,33.1013413 L72.0865283,14.5100578 C71.9292287,14.0937135 71.85058,13.7414274 71.85058,13.453189 C71.85058,12.7165797 72.1651746,12.0840661 72.7943732,11.555629 C73.4235717,11.027192 74.1156798,10.7629774 74.8707181,10.7629774 C75.4055368,10.7629774 75.8931584,10.9070944 76.3335974,11.1953328 C76.7740364,11.4835712 77.1043607,11.9159223 77.3245802,12.4923991 L82.8929597,27.1444443 L88.6029081,12.6365176 C88.8545875,12.0280143 89.2163713,11.5716437 89.6882702,11.2673921 C90.1601691,10.9631404 90.6792502,10.8110169 91.2455289,10.8110169 C91.8118076,10.8110169 92.3308886,10.9631404 92.8027875,11.2673921 C93.2746865,11.5716437 93.6364702,12.0280143 93.8881496,12.6365176 L99.6452877,27.1924838 L105.166478,12.5404386 Z M117.445226,35.022921 C116.595808,35.022921 115.895835,34.7747195 115.345286,34.2783089 C114.794738,33.7818983 114.519467,33.0693196 114.519467,32.1405515 L114.519467,13.5973074 C114.519467,12.6685393 114.794738,11.9639671 115.345286,11.4835698 C115.895835,11.0031725 116.595808,10.7629774 117.445226,10.7629774 C118.294644,10.7629774 119.002482,11.0031725 119.568761,11.4835698 C120.135039,11.9639671 120.418175,12.6685393 120.418175,13.5973074 L120.418175,32.1405515 C120.418175,33.0693196 120.135039,33.7818983 119.568761,34.2783089 C119.002482,34.7747195 118.294644,35.022921 117.445226,35.022921 Z M117.445226,6.48746259 C116.375589,6.48746259 115.526183,6.19122201 114.896985,5.59873198 C114.267786,5.00624195 113.953192,4.22961125 113.953192,3.2688166 C113.953192,2.30802195 114.267786,1.53939776 114.896985,0.962920972 C115.526183,0.386444182 116.375589,0.098210111 117.445226,0.098210111 C118.483404,0.098210111 119.324944,0.386444182 119.969873,0.962920972 C120.614801,1.53939776 120.937261,2.30802195 120.937261,3.2688166 C120.937261,4.22961125 120.622666,5.00624195 119.993468,5.59873198 C119.364269,6.19122201 118.514864,6.48746259 117.445226,6.48746259 Z M139.539423,10.7629774 C140.357382,10.6989244 141.0023,10.8750675 141.474199,11.2914118 C141.946098,11.7077562 142.182044,12.3322633 142.182044,13.164952 C142.182044,14.0296672 141.977558,14.6701874 141.568579,15.0865317 C141.1596,15.5028761 140.420302,15.7750971 139.350665,15.9032031 L137.934975,16.0473216 C136.078839,16.2394805 134.718218,16.8800006 133.85307,17.9689012 C132.987922,19.0578019 132.555354,20.4189072 132.555354,22.0522581 L132.555354,32.1405515 C132.555354,33.0693196 132.272219,33.7818983 131.70594,34.2783089 C131.139662,34.7747195 130.431824,35.022921 129.582406,35.022921 C128.732988,35.022921 128.033015,34.7747195 127.482466,34.2783089 C126.931917,33.7818983 126.656647,33.0693196 126.656647,32.1405515 L126.656647,13.549268 C126.656647,12.6525263 126.931917,11.9639671 127.482466,11.4835698 C128.033015,11.0031725 128.717258,10.7629774 129.535216,10.7629774 C130.353174,10.7629774 131.013823,10.995166 131.517182,11.45955 C132.020541,11.9239341 132.272216,12.5884738 132.272216,13.453189 L132.272216,15.3747687 C132.869955,13.9656032 133.758685,12.8767189 134.938432,12.1080832 C136.118179,11.3394475 137.431612,10.9070964 138.878768,10.8110169 L139.539423,10.7629774 Z M162.671793,28.2973921 C163.206612,28.2973921 163.639179,28.5055611 163.969509,28.9219055 C164.299838,29.3382498 164.465,29.898705 164.465,30.6032877 C164.465,31.5961089 163.883,32.4287851 162.718983,33.1013413 C161.649345,33.7098446 160.438156,34.1982412 159.085379,34.5665458 C157.732602,34.9348505 156.442765,35.119 155.215827,35.119 C151.503556,35.119 148.562097,34.0301157 146.391362,31.8523145 C144.220626,29.6745133 143.135275,26.6960946 143.135275,22.916969 C143.135275,20.5149823 143.607167,18.3852528 144.550965,16.5277165 C145.494763,14.6701802 146.823925,13.2290098 148.538491,12.2041622 C150.253057,11.1793145 152.195678,10.6668984 154.366414,10.6668984 C156.442769,10.6668984 158.251688,11.1312755 159.793224,12.0600437 C161.33476,12.9888119 162.53022,14.3018782 163.379638,15.9992821 C164.229056,17.6966859 164.653759,19.6983114 164.653759,22.0042186 C164.653759,23.3813576 164.056029,24.0699168 162.860552,24.0699168 L148.939603,24.0699168 C149.128363,26.2797445 149.741822,27.9050644 150.78,28.9459252 C151.818177,29.9867861 153.328231,30.5072087 155.310207,30.5072087 C156.316924,30.5072087 157.205654,30.3791047 157.976422,30.1228928 C158.74719,29.8666809 159.62019,29.5143948 160.595448,29.066024 C161.539246,28.5536002 162.231354,28.2973921 162.671793,28.2973921 Z M154.507982,14.8943737 C152.903526,14.8943737 151.621553,15.4067899 150.662025,16.4316375 C149.702498,17.4564851 149.128363,18.9296815 148.939603,20.8512708 L159.604465,20.8512708 C159.541546,18.897655 159.069654,17.4164521 158.188776,16.4076177 C157.307898,15.3987834 156.080979,14.8943737 154.507982,14.8943737 Z" id="Combined-Shape-Copy" stroke="#4E56A6"></path>
              </g>
              <g id="Jelly" style="transform: translateY(2.99989%);">
                <path d="M46.7606724,33.2469068 C45.9448607,34.4803214 45.3250477,36 43.6664081,36 C40.8749581,36 40.7240285,31.6956522 37.9310842,31.6956522 C35.1381399,31.6956522 35.2890695,36 32.4976195,36 C29.7061695,36 29.55524,31.6956522 26.7622957,31.6956522 C23.9693513,31.6956522 24.1202809,36 21.3288309,36 C18.537381,36 18.3864514,31.6956522 15.5935071,31.6956522 C12.8005628,31.6956522 12.9514923,36 10.1600424,36 C9.2827466,36 8.66625943,35.5748524 8.14660082,34.9917876 C6.14914487,31.5156333 5,27.4421238 5,23.0869565 C5,10.3363825 14.8497355,0 27,0 C39.1502645,0 49,10.3363825 49,23.0869565 C49,26.7327091 48.1947338,30.1810893 46.7606724,33.2469068 Z" id="Body-Copy-2" fill="#FB70A9"></path>
                <g id="Legs" transform="translate(12.000000, 27.000000)">
                  <mask id="mask-2" fill="white">
                    <use xlink:href="#path-100"></use>
                  </mask>
                  <use id="Combined-Shape" fill="#4E56A6" xlink:href="#path-100"></use>
                  <mask id="mask-4" fill="white">
                    <use xlink:href="#path-300"></use>
                  </mask>
                  <use id="Combined-Shape" fill-opacity="0.298513986" fill="#000000" xlink:href="#path-300"></use>
                </g>
                <path d="M46.7606724,33.2469068 C45.9448607,34.4803214 45.3250477,36 43.6664081,36 C40.8749581,36 40.7240285,31.6956522 37.9310842,31.6956522 C35.1381399,31.6956522 35.2890695,36 32.4976195,36 C29.7061695,36 29.55524,31.6956522 26.7622957,31.6956522 C23.9693513,31.6956522 24.1202809,36 21.3288309,36 C18.537381,36 18.3864514,31.6956522 15.5935071,31.6956522 C12.8005628,31.6956522 12.9514923,36 10.1600424,36 C9.2827466,36 8.66625943,35.5748524 8.14660082,34.9917876 C6.14914487,31.5156333 5,27.4421238 5,23.0869565 C5,10.3363825 14.8497355,0 27,0 C39.1502645,0 49,10.3363825 49,23.0869565 C49,26.7327091 48.1947338,30.1810893 46.7606724,33.2469068 Z" id="Body-Copy-4" fill="#FB70A9"></path>
                <path d="M42,35.5400931 C47.765228,26.9635183 47.9142005,17.4501539 42.4469174,7 C46.4994826,11.151687 49,16.849102 49,23.1355865 C49,26.7676093 48.1653367,30.203003 46.6789234,33.2572748 C45.8333297,34.4860445 45.1908898,36 43.4716997,36 C42.8832919,36 42.4080759,35.8226537 42,35.5400931 Z" id="Combined-Shape" fill="#E24CA6"></path>
                <g id="Eyes-Copy-2" transform="translate(0.000000, 6.000000)">
                  <path d="M25.8205128,22.8461538 C33.4710351,22.8461538 36.6923077,18.4078931 36.6923077,12.1048951 C36.6923077,5.80189712 31.8248393,0 25.8205128,0 C19.8161863,0 14.9487179,5.80189712 14.9487179,12.1048951 C14.9487179,18.4078931 18.1699905,22.8461538 25.8205128,22.8461538 Z" id="Oval" fill="#FFFFFF"></path>
                  <g id="Pupil" transform="translate(18.820513, 3.461538)">
                    <ellipse id="Oval" fill="#030776" cx="4.07692308" cy="4.5" rx="4.07692308" ry="4.5"></ellipse>
                    <ellipse id="Oval" fill="#FFFFFF" cx="3.3974359" cy="3.46153846" rx="2.03846154" ry="2.07692308"></ellipse>
                  </g>
                </g>
              </g>
            </g>
          </g>
        </g>
      </svg>
    </div>
  </div>
</div>
</div>
</div>

<div class="pt-12 bg-gray-50 sm:pt-16">
  <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-extrabold leading-9 text-gray-900 sm:text-4xl sm:leading-10">
        Trusted by developers
      </h2>
      <p class="mt-3 text-xl leading-7 text-gray-600 sm:mt-4">
        This package powers many production applications on many different hosting platforms.
      </p>
    </div>
  </div>
  <div class="pb-12 mt-10 bg-gray-50 sm:pb-16">
    <div class="relative">
      <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
      <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
          <dl class="bg-white rounded-lg shadow-lg sm:grid sm:grid-cols-3">
            <div class="flex flex-col p-6 text-center border-b border-gray-100 sm:border-0 sm:border-r">
              <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500" id="item-1">
                Stars on GitHub
              </dt>
              <dd class="order-1 text-5xl font-extrabold leading-none text-indigo-600" aria-describedby="item-1">
                900+
              </dd>
            </div>
            <div
            class="flex flex-col p-6 text-center border-t border-b border-gray-100 sm:border-0 sm:border-l sm:border-r">
            <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500">
              Downloads
            </dt>
            <dd class="order-1 text-5xl font-extrabold leading-none text-indigo-600">
              25 000+
            </dd>
          </div>
          <div class="flex flex-col p-6 text-center border-t border-gray-100 sm:border-0 sm:border-l">
            <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500">
              Sponsors &lt;3
            </dt>
            <dd class="order-1 text-5xl font-extrabold leading-none text-indigo-600">
              25+
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</div>
</div>

<div class="bg-gray-50">
  @include('_partials.testimonials')
</div>

<div class="flex justify-center bg-gray-50">
  <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:py-16 lg:px-8">
    <h2 class="text-3xl font-extrabold leading-normal tracking-tight text-center text-gray-900 sm:text-4xl">
      <p>
        Want updates about big releases and product launches?
      </p>
      <p>
        <span class="text-indigo-600">Sign up for our newsletter.</span>
      </p>
    </h2>
    <form action="https://github.us3.list-manage.com/subscribe/post?u=6a33c422777aedd88e9a9488e&amp;id=9b99f013b8" method="post" target="_blank" class="justify-center mt-8 sm:flex">
      <input aria-label="Email address" name="EMAIL" type="email" required
      class="w-full px-5 py-3 text-base leading-6 text-gray-900 placeholder-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline focus:border-blue-300 sm:max-w-xs"
      placeholder="Enter your email" />
      <input type="hidden" value="8" name="group[27425][8]" id="mce-group[27425]-27425-3">
      <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
        <button
        class="flex items-center justify-center w-full px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
        Notify me
      </button>
    </div>
  </form>
</div>
</div>

<div class="bg-gray-50" x-data="{ openPanel: 1 }">
  <div class="max-w-screen-xl px-4 py-12 mx-auto sm:py-16 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-3xl font-extrabold leading-9 text-center text-gray-900 sm:text-4xl sm:leading-10">
        Frequently asked questions
      </h2>
      <div class="pt-6 mt-6 border-t-2 border-gray-200">
        <dl>
          <div>
            <dt class="text-lg leading-7">
              <button x-description="Expand/collapse question button" @click="openPanel = (openPanel === 1 ? null : 1)"
              class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
              x-bind:aria-expanded="openPanel === 1" aria-expanded="true">
              <span class="font-medium text-gray-900">
                Is the package ready for production?
              </span>
              <span class="flex items-center ml-6 h-7">
                <svg class="w-6 h-6 transform -rotate-180"
                x-description="Expand/collapse icon, toggle classes based on question open state." x-state-on="Open"
                x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
                :class="{ '-rotate-180': openPanel === 1, 'rotate-0': !(openPanel === 1) }"
                x-bind-class="{ '-rotate-180': openPanel === 1, 'rotate-0': !(openPanel === 1) }"
                stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </span>
          </button>
        </dt>
        <dd class="pr-12 mt-2" x-show="openPanel === 1">
          <p class="text-base leading-6 text-gray-700">
            Yes! The package is in its third major version and has been stable since February 2019. Many people are
            using it in production.
          </p>
        </dd>
      </div>
      <div class="pt-6 mt-6 border-t border-gray-200">
        <div>
          <dt class="text-lg leading-7">
            <button x-description="Expand/collapse question button"
            @click="openPanel = (openPanel === 2 ? null : 2)"
            class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
            x-bind:aria-expanded="openPanel === 2">
            <span class="font-medium text-gray-900">
              Does the package only support multi&#8209;database tenancy?
            </span>
            <span class="flex items-center ml-6 h-7">
              <svg class="w-6 h-6 transform rotate-0"
              x-description="Expand/collapse icon, toggle classes based on question open state."
              x-state-on="Open" x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
              :class="{ '-rotate-180': openPanel === 2, 'rotate-0': !(openPanel === 2) }"
              x-bind-class="{ '-rotate-180': openPanel === 2, 'rotate-0': !(openPanel === 2) }"
              stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </span>
        </button>
      </dt>
      <dd class="pr-12 mt-2" x-show="openPanel === 2" style="display: none;">
        <p class="text-base leading-6 text-gray-700">
          No, the package supports multi-database tenancy as well as single-database tenancy. For multi-database
          tenancy, it comes with classes for managing MySQL/SQLite/PostgreSQL databases or schemas and for
          single-database tenancy it comes with model scopes and traits.
        </p>
      </dd>
    </div>
  </div>
  <div class="pt-6 mt-6 border-t border-gray-200">
    <div>
      <dt class="text-lg leading-7">
        <button x-description="Expand/collapse question button"
        @click="openPanel = (openPanel === 3 ? null : 3)"
        class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
        x-bind:aria-expanded="openPanel === 3">
        <span class="font-medium text-gray-900">
          Is this package flexible?
        </span>
        <span class="flex items-center ml-6 h-7">
          <svg class="w-6 h-6 transform rotate-0"
          x-description="Expand/collapse icon, toggle classes based on question open state."
          x-state-on="Open" x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
          :class="{ '-rotate-180': openPanel === 3, 'rotate-0': !(openPanel === 3) }"
          x-bind-class="{ '-rotate-180': openPanel === 3, 'rotate-0': !(openPanel === 3) }"
          stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </span>
    </button>
  </dt>
  <dd class="pr-12 mt-2" x-show="openPanel === 3" style="display: none;">
    <p class="text-base leading-6 text-gray-700">
      Yes! Version 3 is focused heavily on flexibility. The package comes with great defaults for
      bootstrapping tenancy automatically based on domains, but if you need to customize anything, or add
      any behavior — you can do that very easily.
    </p>
  </dd>
</div>
</div>
<div class="pt-6 mt-6 border-t border-gray-200">
  <div>
    <dt class="text-lg leading-7">
      <button x-description="Expand/collapse question button"
      @click="openPanel = (openPanel === 4 ? null : 4)"
      class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
      x-bind:aria-expanded="openPanel === 4">
      <span class="font-medium text-gray-900">
        Can I use Laravel Nova with this package?
      </span>
      <span class="flex items-center ml-6 h-7">
        <svg class="w-6 h-6 transform rotate-0"
        x-description="Expand/collapse icon, toggle classes based on question open state."
        x-state-on="Open" x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
        :class="{ '-rotate-180': openPanel === 4, 'rotate-0': !(openPanel === 4) }"
        x-bind-class="{ '-rotate-180': openPanel === 4, 'rotate-0': !(openPanel === 4) }"
        stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </span>
  </button>
</dt>
<dd class="pr-12 mt-2" x-show="openPanel === 4" style="display: none;">
  <p class="text-base leading-6 text-gray-700">
    Yes! You can use Nova both to manage tenants and to manage resources inside tenant databases.
  </p>
</dd>
</div>
</div>
<div class="pt-6 mt-6 border-t border-gray-200">
  <div>
    <dt class="text-lg leading-7">
      <button x-description="Expand/collapse question button"
      @click="openPanel = (openPanel === 5 ? null : 5)"
      class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
      x-bind:aria-expanded="openPanel === 5">
      <span class="font-medium text-gray-900">
        Does the package work with [package name]?
      </span>
      <span class="flex items-center ml-6 h-7">
        <svg class="w-6 h-6 transform rotate-0"
        x-description="Expand/collapse icon, toggle classes based on question open state."
        x-state-on="Open" x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
        :class="{ '-rotate-180': openPanel === 5, 'rotate-0': !(openPanel === 5) }"
        x-bind-class="{ '-rotate-180': openPanel === 5, 'rotate-0': !(openPanel === 5) }"
        stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </span>
  </button>
</dt>
<dd class="pr-12 mt-2" x-show="openPanel === 5" style="display: none;">
  <p class="text-base leading-6 text-gray-700">
    Likely yes. The automatic mode of tenancy integrates perfectly with 99% of packages with little to no
    code changes required.
  </p>
</dd>
</div>
</div>
<div class="pt-6 mt-6 border-t border-gray-200">
  <div>
    <dt class="text-lg leading-7">
      <button x-description="Expand/collapse question button"
      @click="openPanel = (openPanel === 6 ? null : 6)"
      class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
      x-bind:aria-expanded="openPanel === 6">
      <span class="font-medium text-gray-900">
        Can I use Laravel Vapor to deploy an application using this package?
      </span>
      <span class="flex items-center ml-6 h-7">
        <svg class="w-6 h-6 transform rotate-0"
        x-description="Expand/collapse icon, toggle classes based on question open state."
        x-state-on="Open" x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
        :class="{ '-rotate-180': openPanel === 6, 'rotate-0': !(openPanel === 6) }"
        x-bind-class="{ '-rotate-180': openPanel === 6, 'rotate-0': !(openPanel === 6) }"
        stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </span>
  </button>
</dt>
<dd class="pr-12 mt-2" x-show="openPanel === 6" style="display: none;">
  <p class="text-base leading-6 text-gray-700">
    Yes, many people are using the package on Vapor and reported no issues at all.
  </p>
</dd>
</div>
</div>
<div class="pt-6 mt-6 border-t border-gray-200">
  <div>
    <dt class="text-lg leading-7">
      <button x-description="Expand/collapse question button"
      @click="openPanel = (openPanel === 7 ? null : 7)"
      class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
      x-bind:aria-expanded="openPanel === 7">
      <span class="font-medium text-gray-900">
        If I need help, is there any support?
      </span>
      <span class="flex items-center ml-6 h-7">
        <svg class="w-6 h-6 transform rotate-0"
        x-description="Expand/collapse icon, toggle classes based on question open state."
        x-state-on="Open" x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
        :class="{ '-rotate-180': openPanel === 7, 'rotate-0': !(openPanel === 7) }"
        x-bind-class="{ '-rotate-180': openPanel === 7, 'rotate-0': !(openPanel === 7) }"
        stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </span>
  </button>
</dt>
<dd class="pr-12 mt-2" x-show="openPanel === 7" style="display: none;">
  <p class="text-base leading-6 text-gray-700">
    Yes, you can ask questions on our <a class="text-indigo-600" href="https://discord.gg/7cpgPxv">Discord community</a>. We also offer paid consulting &mdash; <a class="text-indigo-600" href="/contact/">just shoot us an email.</a>
  </p>
</dd>
</div>
</div>
</dl>
</div>
</div>
</div>
</div>

@endsection