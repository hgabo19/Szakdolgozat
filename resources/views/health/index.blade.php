<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Health') }}
        </h1>
    </x-slot>
    
    <div class="p-4">
        <x-calorie-modal>
            <x-slot:body>
                <livewire:calorie-calculation >
            </x-slot:body>
        </x-calorie-modal>
        
        <div class="container mx-auto p-20">
            <div class="bg-white shadow-md p-6 rounded-md flex justify-center relative h-36 w-fit">
                <p class="text-lg font-bold mb-4">Here you can calculate your needed calorie intake</p>
                <button x-data x-on:click="$dispatch('open-modal')" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 absolute top-16">
                    Calculate
                </button>
            </div>
        </div>
    </div>
</x-app-layout>