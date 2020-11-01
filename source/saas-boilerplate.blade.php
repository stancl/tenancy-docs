@extends('_layouts.master', ['title' => 'Multi-tenant SaaS boilerplate for Laravel'])

@section('content')

<div class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
    <div class="text-center">
    <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
        Multi-tenant
        <br class="xl:hidden" />
        <span class="text-indigo-600">SaaS boilerplate
        </span>
    </h2>
    <p class="mt-3 max-w-md mx-auto text-base text-gray-600 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
        An application skeleton on top of which you can build your multi-tenant SaaS.
    </p>
    </div>
</div>

<div class="mt-12 bg-white">
  <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-screen-xl lg:px-8">
    <div class="lg:grid lg:grid-cols-3 lg:gap-8">
      <div>
        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
          <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
        </div>
        <div class="mt-5">
          <h5 class="text-lg leading-6 font-medium text-gray-900">Complete sign-up flow
          </h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Tenant registration, <em>"your application is being created"</em> message, logging in to tenant applications from central domain using email and much more.
          </p>
        </div>
      </div>
      <div class="mt-10 lg:mt-0">
        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
          <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
        </div>
        <div class="mt-5">
          <h5 class="text-lg leading-6 font-medium text-gray-900">Cashier billing
          </h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Cashier already integrated. Tenants select their billing plan on registration and can later change it in their dashboard.
          </p>
        </div>
      </div>
      <div class="mt-10 lg:mt-0">
        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
          <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
        </div>
        <div class="mt-5">
          <h5 class="text-lg leading-6 font-medium text-gray-900">Nova admin panel
          </h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Manage tenants and their domains from Laravel Nova. We have Nova Resources that are ready for use.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-12 bg-white">
  <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-screen-xl lg:px-8">
    <div class="lg:grid lg:grid-cols-3 lg:gap-8">
      <div>
        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z" clip-rule="evenodd"></path></svg>
        </div>
        <div class="mt-5">
          <h5 class="text-lg leading-6 font-medium text-gray-900">Domain management
          </h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Customers can manage their domains &mdash; change subdomains and add custom 2nd level domains.
          </p>
        </div>
      </div>
      <div class="mt-10 lg:mt-0">
        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2 10a4 4 0 004 4h3v3a1 1 0 102 0v-3h3a4 4 0 000-8 4 4 0 00-8 0 4 4 0 00-4 4zm9 4H9V9.414l-1.293 1.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 9.414V14z" clip-rule="evenodd"></path></svg>
        </div>
        <div class="mt-5">
          <h5 class="text-lg leading-6 font-medium text-gray-900">Ploi integration
          </h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Integration with <a href="https://ploi.io/?ref=tenancyforlaravel.com" class="text-indigo-600 hover:text-indigo-500">ploi.io</a>. Automatic creation of vhosts and HTTPS certificates when customers add domains.
          </p>
        </div>
      </div>
      <div class="mt-10 lg:mt-0">
        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        </div>
        <div class="mt-5">
          <h5 class="text-lg leading-6 font-medium text-gray-900">Tenant-aware test suite
          </h5>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Tests structured for separate central and tenant tests. The tenant test suite works so smooth that you don't even have to think about multi-tenancy when writing the tests &mdash; just like when using the package.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<h2 class="mt-16 text-center text-xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
  UI showcase
</h2>
<div class="mt-8 flex justify-center">
  <iframe width="1020" height="630" src="https://www.youtube.com/embed/xbdhjZLSAEo?controls=0&list=PLGo_dYdM42qSrun8QGjAdXqwV320mIGBy" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<h2 class="mt-16 text-center text-xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
  User settings
</h2>
<div class="mt-8 flex items-center justify-center">
  <img class="w-3/4" alt="User settings" src="https://i.imgur.com/1Ddn2q6.png">
</div>

<h2 class="mt-16 text-center text-xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
  Tenant-aware test suite
</h2>
<div class="mt-8 flex items-center justify-center">
  <img class="w-3/4" alt="Tenant-aware test suite" src="https://i.imgur.com/pgG0ctW.png">
</div>

<h2 class="mt-16 text-center text-xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
  Nova resources
</h2>
<div class="mt-8 flex items-center justify-center">
  <img class="w-3/4" alt="Nova resources" src="https://i.imgur.com/lwJaO0q.png">
</div>

<div class="mt-12 bg-gray-900">
  <div class="pt-12 sm:pt-16 lg:pt-24">
    <div class="max-w-screen-xl mx-auto text-center px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto lg:max-w-none">
        <h2 class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">
          Pricing
        </h2>
        <p class="mt-2 text-3xl leading-9 font-extrabold text-white sm:text-4xl sm:leading-10 lg:text-5xl lg:leading-none">
          The right price for you
        </p>
        <p class="mt-2 text-xl leading-7 text-gray-300">
          We try to make the boilerplate affordable for small startups, while also providing premium services for enterprise clients.
        </p>
        <p class="mt-2 text-xl leading-7 text-gray-300">
          One time payment. Save tens of hours of development time and focus on your application, not boilerplate.
        </p>
      </div>
    </div>
  </div>
  <div class="mt-8 pb-12 bg-gray-50 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
    <div class="relative">
      <div class="absolute inset-0 h-3/4 bg-gray-900"></div>
      <div class="relative z-10 max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5">
          <div class="rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
              <div>
                <h3 class="inline-flex px-4 py-1 rounded-full text-sm leading-5 font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600" id="tier-standard">
                  Standard
                </h3>
              </div>
              <div class="mt-4 flex items-baseline text-6xl leading-none font-extrabold">
                $199
                <span class="ml-1 line-through text-2xl leading-8 font-medium text-gray-500">
                  $299
                </span>
              </div>
              <p class="mt-5 text-lg leading-7 text-gray-500">
                The perfect starting point for small SaaS companies.
              </p>
            </div>
            <div class="px-6 pt-6 pb-8 bg-gray-50 sm:p-10 sm:pt-6">
              <ul>
                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    Asynchronous tenant onboarding flow
                  </p>
                </li>
                <li class="mt-4 flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    Domain management UI
                  </p>
                </li>
                <li class="mt-4 flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    Billing logic integrated
                  </p>
                </li>
                <li class="mt-4 flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    Nova admin resources
                  </p>
                </li>
              </ul>
              <div class="mt-6 rounded-md shadow">
                <a target="_blank" href="https://gumroad.com/l/saas-boilerplate?offer_code=launch2&wanted=true" class="flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out" aria-describedby="tier-standard">
                  Details
                </a>
              </div>
            </div>
          </div>
          <div class="mt-4 rounded-lg shadow-lg overflow-hidden lg:mt-0">
            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
              <div>
                <h3 class="inline-flex px-4 py-1 rounded-full text-sm leading-5 font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600" id="tier-enterprise">
                  Enterprise
                </h3>
              </div>
              <div class="mt-4 flex items-baseline text-6xl leading-none font-extrabold">
                $379
                <span class="ml-1 line-through text-2xl leading-8 font-medium text-gray-500">
                  $499
                </span>
              </div>
              <p class="mt-5 text-lg leading-7 text-gray-500">
                Premium service for clients with enterprise needs.
              </p>
            </div>
            <div class="px-6 pt-6 pb-8 bg-gray-50 sm:p-10 sm:pt-6">
              <ul>
                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    All <em>Standard</em> features
                  </p>
                </li>
                <li class="mt-4 flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    &gt; $60k annual revenue
                  </p>
                </li>
                <li class="mt-4 flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    Priority support
                  </p>
                </li>
                <li class="mt-4 flex items-start">
                  <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                  </div>
                  <p class="ml-3 text-base leading-6 text-gray-700">
                    Company listed as a sponsor
                  </p>
                </li>
              </ul>
              <div class="mt-6 rounded-md shadow">
                <a target="_blank" href="https://gumroad.com/l/saas-boilerplate-enterprise?offer_code=launch-website&wanted=true" class="flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out" aria-describedby="tier-enterprise">
                  Details
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4 relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 lg:mt-5">
      <div class="max-w-md mx-auto lg:max-w-5xl">
        <div class="rounded-lg bg-gray-100 px-6 py-8 sm:p-10 lg:flex lg:items-center">
          <div class="flex-1">
            <div>
              <h3 class="inline-flex px-4 py-1 rounded-full text-sm leading-5 font-semibold tracking-wide uppercase bg-white text-gray-800">
                Price parity
              </h3>
            </div>
            <div class="mt-4 text-lg leading-7 text-gray-600">
              <p>
                If you're from a low-income country and working on a small startup, we'll gladly give you a discount.
              </p>
              <p class="mt-2">
                We want the boilerplate profits to sustain the package's development, but more importantly we want to help you build a better future for yourself.
              </p>
            </div>
          </div>
          <div class="mt-6 rounded-md shadow lg:mt-0 lg:ml-10 lg:flex-shrink-0">
            <a href="/contact" class="flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-gray-900 bg-white hover:text-gray-700 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
              Send us a message
            </a>
          </div>
        </div>
      </div>
    </div>
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
                Can I pay with PayPal/credit card?
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
            Yes! Payments are processed using Gumroad which lets you pay with PayPal or a payment card.
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
              Can I get an invoice?
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
          Sure! When you receive the payment confirmation from Gumroad, you'll see a <em>Generate invoice</em> button. Use that and add your company details. Also be sure to add your VAT ID during the payment, if you have one, to be billed without extra VAT.
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
          Do I need a Laravel Nova license?
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
      Kind of. If you want to use the prepared Nova resources, yes. If you want to use a custom admin panel &mdash; nothing wrong with that. Simply delete the Nova files and write your admin panel.
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
        Do you offer discounts/PPP?
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
    If you're from a low-income country, yes. See the section about price parity below the pricing section. We want the boilerplate to help pay for the package's development, but if you <strong>need</strong> a discount to start building your project, we'll gladly give it to you.
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
        For how many sites can the boilerplate be used?
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
    The boilerplate is not bound to a specific site. It's simply yours. When you have access to it, you can use it to build your products. Just don't share it with third parties.
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
        Can I use Mollie/Paddle/...?
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
    Yes, you can use anything you want. The boilerplate comes with defaults to get you up & running as quickly as possible, but you can change every single part of it.
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
        What's the difference between the two licenses?
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
    The <strong>Standard</strong> license is for smaller companies making &lt; 60 000 USD in annual revenue. The <strong>Enterprise</strong> license is for companies making more than that, or companies that want priority support.
  </p>
</dd>
</div>
</div>
<div class="pt-6 mt-6 border-t border-gray-200">
  <div>
    <dt class="text-lg leading-7">
      <button x-description="Expand/collapse question button"
      @click="openPanel = (openPanel === 8 ? null : 8)"
      class="flex items-start justify-between w-full text-left text-gray-400 focus:outline-none focus:text-gray-900"
      x-bind:aria-expanded="openPanel === 8">
      <span class="font-medium text-gray-900">
        What setup does the boilerplate use?
      </span>
      <span class="flex items-center ml-6 h-7">
        <svg class="w-6 h-6 transform rotate-0"
        x-description="Expand/collapse icon, toggle classes based on question open state."
        x-state-on="Open" x-state:on="Open" x-state-off="Closed" x-state:off="Closed"
        :class="{ '-rotate-180': openPanel === 8, 'rotate-0': !(openPanel === 8) }"
        x-bind-class="{ '-rotate-180': openPanel === 8, 'rotate-0': !(openPanel === 8) }"
        stroke="currentColor" fill="none" viewBox="0 0 24 24" null="[object Object]">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </span>
  </button>
</dt>
<dd class="pr-12 mt-2" x-show="openPanel === 8" style="display: none;">
  <p class="text-base leading-6 text-gray-700">
    Laravel 7 (a new version with Jetstream and Laravel 8 will be released in the coming months). Multi-domain multi-database tenancy. Customers get subdomains by default, can add their own 2nd level domains. Billing is done with Cashier Stripe, front-end is done with Tailwind CSS, occasional Alpine.js, and Livewire for some forms.
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

@push('scripts')
<script type="text/javascript" src="https://gumroad.com/js/gumroad.js"></script>
@endpush
