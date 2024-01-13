<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calories') }}
        </h1>
    </x-slot>

    <nav class="flex justify-center items-center flex-row gap-32">
        <x-nav-link wire:navigate href="{{ route('health.index') }}" :active="request()->routeIs('health.index')">
            Health data
        </x-nav-link>
        <x-nav-link wire:navigate href="{{ route('health.calories') }}" :active="request()->routeIs('health.calories')">
            Calories
        </x-nav-link>
        <x-nav-link wire:navigate href="{{ route('health.challenges') }}" :active="request()->routeIs('health.challenges')">
            Challenges            
        </x-nav-link>
    </nav>
    
    <div class="pt-20 flex flex-row">
        <p>halii</p>
        
    </div>
</x-app-layout>