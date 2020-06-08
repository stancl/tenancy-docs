@php $level = $level ?? 0 @endphp

<ul class="my-0 list-reset">
    @foreach ($items as $label => $item)
        @include('_nav.menu-item')
    @endforeach
</ul>
