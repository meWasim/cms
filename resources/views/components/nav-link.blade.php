@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex space-x-2 items-center hover:text-purple-900 text-sm text-purple-500'
            : 'flex space-x-2 items-center hover:text-purple-900 text-sm text-gray-500';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
