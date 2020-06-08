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
        An application skeleton on top of which you can build your multi-tenant SaaS. <span class="font-semibold">Coming soon.</span>
    </p>
    </div>
</div>

<div class="bg-white">
  <div class="max-w-screen-xl mx-auto px-4 pt-12 sm:px-6 lg:pt-16 lg:px-8">
    <div class="px-6 py-6 bg-indigo-700 rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
      <div class="xl:w-0 xl:flex-1">
        <h2 class="text-2xl leading-8 font-extrabold tracking-tight text-white sm:text-3xl sm:leading-9">
          Join the waiting list
        </h2>
        <p class="mt-3 max-w-3xl text-lg leading-6 text-indigo-200" id="newsletter-headline">
          We'll notify you when it's ready to be used.
        </p>
      </div>
      <div class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
        <form action="https://github.us3.list-manage.com/subscribe/post?u=6a33c422777aedd88e9a9488e&amp;id=9b99f013b8" method="post" target="_blank" class="sm:flex" aria-labelledby="newsletter-headline">
          <input aria-label="Email address" name="EMAIL" type="email" required class="appearance-none w-full px-5 py-3 border border-transparent text-base leading-6 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out" placeholder="Enter your email" />
          <input type="hidden" value="8" name="group[27425][8]" id="mce-group[27425]-27425-3">
          <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
            <button class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:bg-indigo-400 transition duration-150 ease-in-out">
              Notify me
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="py-12 bg-white">
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

@endsection