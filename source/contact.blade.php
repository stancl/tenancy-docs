@extends('_layouts.master', ['title' => 'Contact'])

@section('content')
<div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
  <div class="relative max-w-xl mx-auto">
    <div class="text-center">
      <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
        Contact us
      </h2>
      <p class="mt-4 text-lg leading-6 text-gray-500">
        You can contact us if you need consulting, want to have your implementation audited, or want to discuss something.
      </p>
      <p class="mt-4 text-lg leading-6 text-gray-500">
        You can also use email: <a class="text-indigo-700" href="mailto:tenancy@archte.ch">tenancy@archte.ch</a>.
      </p>
    </div>
    <div class="mt-12">
      <form netlify class="grid grid-cols-1 row-gap-6 sm:grid-cols-2 sm:col-gap-8">
        <div>
          <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name
          </label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input required id="first_name" name="first_name" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150" />
          </div>
        </div>
        <div>
          <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name
          </label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input required id="last_name" name="last_name" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150" />
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="company" class="block text-sm font-medium leading-5 text-gray-700">Company
          </label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input required id="company" name="company" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150" />
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email
          </label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input required id="email" name="email" type="email" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150" />
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="message" class="block text-sm font-medium leading-5 text-gray-700">Message
          </label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <textarea required id="message" name="message" rows="4" class="form-textarea py-3 px-4 block w-full transition ease-in-out duration-150"></textarea>
          </div>
        </div>
        <div class="sm:col-span-2">
          <span class="w-full inline-flex rounded-md shadow-sm">
            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              Let's talk
            </button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
