<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Health') }}
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
        <x-custom-modal>
            <x-slot:body>
                <livewire:calorie-calculation >
            </x-slot:body>
        </x-custom-modal>
        
        <div class="w-fit p-20 flex justify-center">
            <div class="bg-gray-800 shadow-md p-10 rounded-md relative h-fit w-fit">
                <p class="text-lg text-gray-100 font-bold mb-4">Here you can calculate your needed calorie intake</p>
                <div class="flex">
                    <button x-data x-on:click="$dispatch('open-modal')" class="bg-blue-700  text-gray-100 my-5 py-3 px-6 rounded-md hover:bg-blue-600 top-16 mx-auto">
                        Calculate
                    </button>
                </div>
            </div>
        </div>
        <div class="w-fit p-16 m-5">
            <div class="bg-gray-800 shadow-lg p-6 rounded-md flex justify-center relative w-fit h-fit">
                <livewire:health-summary >
            </div>
        </div>
    </div>
</x-app-layout>