@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'bg-purple text-white hover:bg-highlight-color transition duration-400 ease-in-out'
            : 'hover:bg-purple transition duration-300 ease-in-out';
@endphp

<a
    {{ $attributes->class(['inline-flex w-48 items-center justify-center py-1 px-4 my-8 lg:text-xl text-base rounded '])->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
