@props(['active'])

@php
$classes = ($active ?? false)
            ? 'hover:bg-highlight-color transition duration-400 ease-in-out py-2 font-bold text-xl border-b-2 border-action-color text-white inline-flex w-48 items-center justify-center px-4'
            : 'py-2 font-bold text-xl text-white hover:text-white inline-flex w-48 items-center justify-center px-4 rounded hover:bg-purple transition duration-400 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
