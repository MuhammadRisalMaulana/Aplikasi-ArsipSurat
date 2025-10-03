@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full px-3 py-2 rounded bg-gray-900 text-white font-medium'
            : 'block w-full px-3 py-2 rounded text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
