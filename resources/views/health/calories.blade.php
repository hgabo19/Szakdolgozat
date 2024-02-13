<x-app-layout>
    @include('components.health-tabs')
    

    <div class="my-10 grid grid-cols-2 gap-y-10 gap-x-5 ml-10">
        <x-custom-modal>
            <x-slot:body>
                @livewire('meal-tracker')            
            </x-slot:body>
        </x-custom-modal>

        {{-- food list --}}
        <div class="bg-secondary-color border-none container content w-2/3 my-6 overflow-auto mx-auto border rounded-lg shadow-lg hover:shadow-xl">
            <div class="flex relative">
                <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Food list for the day</h1>
                <div class="absolute end-0 top-6 right-8">
                    <button x-data x-on:click="$dispatch('open-modal')">
                        @include('components.plus-button')
                    </button>
                </div>
            </div>
            <div class="font-medium text-lg text-white px-5 my-3">
                Banana
            </div>
            <hr class="h-1 my-5 bg-purple border-0 w-30 mx-6">
            <div class="font-medium text-lg text-white px-5 my-3">
                Chicken breasts
            </div>
            <hr class="w-3/4 h-0.5 mt-8 bg-purple border-0 ml-28 ">
            <div class="flex justify-end">
                <h2 class="font-extrabold text-xl text-white mx-6 py-4">Total calories: 0</h2>
            </div>
            <div class="flex">
                <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Previously tracked days</h1>
            </div>
        </div>
        {{-- graph --}}
        <div class="bg-secondary-color border-none container content w-2/3 my-6 overflow-auto mx-auto border rounded-lg shadow-lg hover:shadow-xl">
            <div class="flex">
                <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Graph on the daily calorie count</h1>
            </div>
        </div>
    </div>
</x-app-layout>