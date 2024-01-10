<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @if (session('success'))
        <div class="flex items-center justify-center">
            <div class="bg-green-400 text-white p-3 m-3 rounded w-80">
                {{ session('success') }}
            </div>
        </div>
    @endif
    
</x-app-layout>
