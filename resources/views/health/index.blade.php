<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Health') }}
        </h1>
    </x-slot>
    
    <div class="pt-20 flex flex-row">
        <x-calorie-modal>
            <x-slot:body>
                <livewire:calorie-calculation >
            </x-slot:body>
        </x-calorie-modal>
        
        <div class="w-fit p-20 flex justify-center">
            <div class="bg-gray-800 shadow-md p-10 rounded-md relative h-fit w-fit">
                <p class="text-lg text-gray-100 font-bold mb-4">Here you can calculate your needed calorie intake</p>
                <button x-data x-on:click="$dispatch('open-modal')" class="bg-blue-700  text-gray-100 my-5 py-3 px-6 rounded-md hover:bg-blue-600 top-16">
                    Calculate
                </button>
            </div>
        </div>
        <div class="w-fit p-16 m-5">
            <div class="bg-gray-800 shadow-lg p-6 rounded-md flex justify-center relative w-fit h-fit">
                <livewire:health-summary >
            </div>
        </div>
    </div>
</x-app-layout>