@php
    $classes = "text-sm text-gray-500 hover:text-gray-900 "
@endphp

<div>
    <a {{ $attributes->merge(['class' => $classes, 'href' => $enlace]) }}>
        {{ $slot }}
    </a>
</div>