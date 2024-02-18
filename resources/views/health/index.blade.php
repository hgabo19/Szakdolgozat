<x-app-layout>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-1 ">
        <x-custom-modal name="calorie-calculation">
            <x-slot:body>
                <livewire:calorie-calculation >
            </x-slot:body>
        </x-custom-modal>
        
        <div class="w-fit mx-auto my-6">
            <div class="bg-secondary-color shadow-lg p-6 rounded-md flex justify-center relative w-fit h-fit">
                <livewire:health-summary >
            </div>
        </div>

        @include('health.calories')

        {{-- graph --}}
        <div class="bg-secondary-color border-none container content w-2/3 my-6 overflow-auto mx-auto border rounded-lg shadow-lg hover:shadow-xl">
            <div class="flex items-center flex-col py-6">
                <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Graph on the daily calorie count</h1>
                <livewire:calorie-graph >
            </div>
        </div>
    </div>
</x-app-layout>