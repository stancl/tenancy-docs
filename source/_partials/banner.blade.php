<div x-cloak class="z-50 fixed bottom-0 inset-x-0 pb-2 sm:pb-5" x-data="{ show: true, hide() { window.localStorage.show_banner = 'hide'; this.show = false } }" x-init="
    show = window.localStorage.show_banner !== 'hide'
    " x-show="show">
    <div class="max-w-screen-xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="p-2 rounded-lg bg-indigo-600 shadow-lg sm:p-3">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                    <span class="flex p-2 rounded-lg bg-indigo-800">
                        <!-- Heroicon name: speakerphone -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </span>
                    <p class="ml-3 font-medium text-white truncate">
                        <span class="md:hidden text-brown-900">
                            Save time with our SaaS application template.
                        </span>
                        <span class="hidden md:inline text-brown-900">
                            Want to save time? Get our multi-tenant SaaS application template.
                        </span>
                    </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                    <a href="https://tenancyforlaravel.com/saas-boilerplate/" data-splitbee-event="Click banner CTA" class="w-full inline-flex space-x-2 justify-center py-2 px-4 rounded-md bg-white text-sm font-medium hover:bg-gray-50">
                        <span class="font-medium text-brown-900">
                            SaaS boilerplate
                        </span>
                    </a>
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                    <button @click="hide()" type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 transition ease-in-out duration-150" aria-label="Dismiss">
                        <!-- Heroicon name: x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
