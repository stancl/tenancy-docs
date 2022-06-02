<li class="list-reset">
    @if ($url = is_string($item) ? $item : $item->url)
        <a href="{{ $page->isUrl($url) ? $url : $page->link($url) }}"
            class="{{ 'lvl' . $level }} {{ $page->isActiveParent($item) ? 'lvl' . $level . '-active' : '' }} {{ $page->isActive($url) ? 'active' : '' }} nav-menu__item"
            @if(\Illuminate\Support\Str::contains($url, 'saas-boilerplate')) data-splitbee-event="Click sidebar CTA" @endif
        >
            {{ $label }}
        </a>
    @else
        {{-- Menu item without URL--}}
        <p class="nav-menu__item text-grey-dark">{{ $label }}</p>
    @endif

    @if (! is_string($item) && $item->children)
        {{-- Recursively handle children --}}
        @include('_nav.menu', ['items' => $item->children, 'level' => ++$level])
    @endif
</li>
