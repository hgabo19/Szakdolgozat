@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-purple hover:bg-highlight-color transition duration-400 ease-in-out my-12 py-2 font-bold text-xl border-2 border-solid border-gray-800 text-white inline-flex w-48 items-center justify-center px-4 rounded'
            : 'my-12 py-2 font-bold text-xl border-2 border-solid border-gray-800 text-white hover:text-white inline-flex w-48 items-center justify-center px-4 rounded hover:bg-purple transition duration-400 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
