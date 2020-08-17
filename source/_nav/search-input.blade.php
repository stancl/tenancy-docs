{{-- <button
    title="Start searching"
    type="button"
    class="md:hidden bg-grey-lightest hover:bg-blue-lightest border-grey focus:outline-none flex items-center justify-center h-10 px-3 border rounded-full"
    onclick="searchInput.toggle()"
>
    <img src="/docs/assets/img/magnifying-glass.svg" alt="search icon" class="max-w-none w-4 h-4">
</button> --}}

<div id="js-search-input" class="hidden md:block pt-6 lg:pt-0 lg:px-6 lg:w-3/4 xl:px-12 flex-grow w-full">
    <div class=" relative rounded-md">
        <span class="algolia-autocomplete algolia-autocomplete-right" style="position: relative; display: inline-block; direction: ltr;"><input id="docsearch" class="focus:outline-0 ds-input block w-full py-2 pl-10 pr-4 leading-normal placeholder-gray-600 transition-colors duration-100 ease-in-out bg-gray-100 border border-transparent rounded-md" type="text" placeholder="Search the documentation" autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-label="search input" aria-owns="algolia-autocomplete-listbox-0" style="position: relative; vertical-align: top;" dir="auto"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Inter var, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;">min</pre><span class="ds-dropdown-menu ds-with-1" style="position: absolute; top: 100%; z-index: 100; left: 0px; right: auto; display: none;" role="listbox" id="algolia-autocomplete-listbox-0"><div class="ds-dataset-1"></div></span></span>
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
        <svg class="w-4 h-4 text-gray-600 pointer-events-none fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path></svg>
        </div>
    </div>
</div>

{{--
    <div id="js-search-input" class="docsearch-input__wrapper md:block">

<label for="search" class="hidden">Search</label>
    <input
        id="docsearch-input"
        class="docsearch-input transition-fast lg:w-3/4 bg-grey-lightest text-grey-darker border-grey focus:border-blue-light relative block w-full h-10 px-4 pb-0 mx-auto border rounded-full outline-none"
        name="docsearch"
        type="text"
        placeholder="Search"
    >

    <button
        class="md:hidden pin-t pin-r text-blue hover:text-blue-dark focus:outline-none pr-7 absolute h-full -mt-px text-3xl font-light"
        onclick="searchInput.toggle()"
    >&times;</button>
</div>--}}

@push('scripts')
    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <script type="text/javascript">
            docsearch({
                apiKey: '{{ $page->docsearchApiKey }}',
                indexName: '{{ $page->docsearchIndexName }}',
                algoliaOptions: { 'facetFilters': ["version:{{ $page->version() }}", "language:en"] },
                inputSelector: '#docsearch',
                debug: false // Set debug to true if you want to inspect the dropdown
            });
        </script>
    @endif
@endpush
