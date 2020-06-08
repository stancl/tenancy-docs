<div x-data="navMenu()" class="relative bg-white" data-turbolinks-permanent>
  <div class="sm:px-6 md:justify-start md:space-x-10 flex items-center justify-between px-4 pt-3 pb-6">
    <div class="lg:w-0 lg:flex-1">
      <a href="{{ $page->baseUrl }}" class="flex" data-turbolinks="false">
        <img src="/assets/img/tenancyforlaravel.svg" alt="" style="height: 70px">
      </a>
    </div>
    <div class="md:hidden -my-2 -mr-2">
      <button @click="toggle()" type="button"
        class="hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md">
        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
    <nav class="md:flex flex-grow hidden">
      @include('_nav.search-input')
    </nav>
    <div class="md:flex md:flex-1 lg:w-0 items-center justify-end hidden space-x-8">
      <div x-data="{ flyoutMenuOpen: false }" @click.away="flyoutMenuOpen = false" class="relative">
        <button type="button" @click="flyoutMenuOpen = !flyoutMenuOpen" x-state:on="Item active"
          x-state:off="Item inactive" :class="{ 'text-gray-900': flyoutMenuOpen, 'text-gray-500': !flyoutMenuOpen }"
          class="group hover:text-gray-900 focus:outline-none focus:text-gray-900 inline-flex items-center space-x-2 text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out">
          <span>Version {{ $page->versions[$page->version()] }}</span>
          <svg x-state-on="Item active" x-state:on="Item active" x-state-off="Item inactive" x-state:off="Item inactive"
            class="group-hover:text-gray-500 group-focus:text-gray-500 w-5 h-5 text-gray-400 transition duration-150 ease-in-out"
            :class="{ 'text-gray-600': flyoutMenuOpen, 'text-gray-400': !flyoutMenuOpen }"
            x-bind-class="{ 'text-gray-600': flyoutMenuOpen, 'text-gray-400': !flyoutMenuOpen }" fill="currentColor"
            viewBox="0 0 20 20" null="[object Object]">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <div x-description="'More' flyout menu, show/hide based on flyout menu state." x-show="flyoutMenuOpen"
          x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1"
          x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
          x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
          class="left-1/2 sm:px-0 absolute w-screen max-w-xs px-2 mt-6 transform -translate-x-1/2"
          style="display: none; max-width: 10rem;">
          <div class="rounded-lg shadow-lg">
            <div class="overflow-hidden rounded-lg shadow-xs">
              <div class="sm:gap-2 sm:p-2 relative z-20 grid gap-2 px-5 py-6 bg-white">
                @foreach ($page->versions as $version => $name)
                <a data-turbolinks="false" href="{{ $page->baseUrl . "/docs/" . $version }}"
                  class="hover:bg-gray-50 block p-3 space-y-1 transition duration-150 ease-in-out rounded-md">
                  <p class="my-0 text-base font-medium leading-6 text-gray-900">
                    Version {{ $name }}
                  </p>
                </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <span class="inline-flex rounded-md shadow-sm">
        <a href="{{ $page->githubUrl }}" data-turbolinks="false"
          class="hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md">
          GitHub
        </a>
      </span>
    </div>
  </div>
</div>

@push('scripts')
<script>
    function navMenu() {
        return {
          mobileMenuOpen: false,
          toggle() {
              const menu = document.getElementById('js-nav-menu');
              menu.classList.toggle('hidden');
              menu.classList.toggle('lg:block');
              mobileMenuOpen = !mobileMenuOpen;
          },


        }
    }
</script>
@endpush