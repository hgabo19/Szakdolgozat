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
    

    <div class="my-10 grid grid-cols-2 gap-y-10 gap-x-5 ml-10">
        <x-custom-modal>
            <x-slot:body>
                @livewire('meal-tracker')            
            </x-slot:body>
        </x-custom-modal>

        <div class="mx-auto w-1/2 py-6">
            <div class="hover:shadow-xl p-6 bg-white border-blue-950 border-t-2 rounded-md shadow-lg">
                <div class="flex ">
                    <h2 class="font-semibold text-2xl text-gray-800 mb-5 mx-auto">Add foods</h2>
                </div>
                <div>
                    <button x-data x-on:click="$dispatch('open-modal')"
                        class="flex justify-center mx-auto mt-10 w-24 px-4 py-2 bg-transparent text-gray-800 border-2 border-solid border-gray-950 font-semibold rounded hover:bg-blue-950 hover:text-white">
                        Add
                    </button>
                </div>
            </div>
        </div>

        {{-- food list --}}
        <div class="bg-white container content w-2/3 my-6 overflow-auto mx-auto border rounded-lg shadow-lg hover:shadow-xl">
            <div class="flex">
                <h1 class="font-semibold text-2xl text-gray-800 my-5 mx-auto">Food list for the day</h1>
            </div>
            <div class="font-medium text-lg text-gray-800 px-5 my-3">
                Banana
            </div>
            <hr class="h-1 my-5 bg-gray-600 border-0 w-30 mx-6">
            <div class="font-medium text-lg text-gray-800 px-5 my-3">
                Chicken breasts
            </div>
            <hr class="w-30 h-0.5 mt-8 bg-gray-600 border-0 ml-8 mr-3">
            <div class="flex justify-end">
                <h2 class="font-extrabold text-xl text-gray-800 mx-6 py-4">Total calories: 0</h2>
            </div>
        </div>
        {{-- previous tracked days --}}
        <div class="bg-white container content w-2/3 my-6 overflow-auto mx-auto border rounded-lg shadow-lg hover:shadow-xl">
            <div class="flex">
                <h1 class="font-semibold text-2xl text-gray-800 my-5 mx-auto">Previously tracked days</h1>
            </div>
        </div>
        {{-- previous tracked days --}}
        <div class="bg-white container content w-2/3 my-6 overflow-auto mx-auto border rounded-lg shadow-lg hover:shadow-xl">
            <div class="flex">
                <h1 class="font-semibold text-2xl text-gray-800 my-5 mx-auto">Graph on the daily calorie count</h1>
            </div>
        </div>
    </div>
</x-app-layout>