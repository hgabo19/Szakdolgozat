@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-blue-950 my-12 py-2 font-bold text-xl border-2 border-solid border-gray-800 text-white inline-flex w-48 items-center justify-center px-4 rounded'
            : 'my-12 py-2 font-bold text-xl border-2 border-solid border-gray-800 hover:text-white inline-flex w-48 items-center justify-center px-4 rounded hover:bg-blue-950 transition duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
