@props(['active'])

@php
$classes = ($active ?? false) ? 'bg-blue-700' : 'hover:bg-blue-700 transition duration-200 ease-in-out';
@endphp

<a {{ $attributes->class(['inline-flex w-48 items-center justify-center py-1 px-4 my-2 rounded '])->merge(['class' => $classes]) }}> 
    {{ $slot }} 
</a>