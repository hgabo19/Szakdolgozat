<x-app-layout>
    <div class="container grid grid-cols-2 gap-3 mx-auto">
        <x-custom-modal name="calorie-calculation">
            <x-slot:body>
                <livewire:calorie-calculation>
            </x-slot:body>
        </x-custom-modal>

        <div class="mx-auto mb-6 w-fit">
            <div
                class="relative flex justify-center p-6 transition duration-300 ease-in-out rounded-md shadow-lg bg-secondary-color hover:shadow-xl hover:shadow-purple shadow-purple w-fit h-fit">
                <livewire:health-summary>
            </div>
        </div>

        <div class="row-span-2">
            @include('health.calories')
        </div>

        {{-- graph --}}
        <div
            class="container px-10 mx-auto mb-4 overflow-auto transition duration-300 ease-in-out border border-none rounded-lg shadow-lg bg-secondary-color content max-w-3/2 w-fit hover:shadow-xl hover:shadow-purple shadow-purple">
            <div class="flex flex-col">
                <h1 class="mx-auto my-5 text-2xl font-semibold text-white">Graph on the daily calorie count</h1>
                <livewire:calorie-graph>
            </div>
        </div>

        <div class="mb-10 h-fit">
            <div class="p-4 mx-auto rounded-md bg-secondary-color w-fit">
                <h1 class="my-5 text-2xl font-semibold text-center text-white">Challenges</h1>
            </div>
        </div>

        <div class="mb-10 h-fit">
            <div class="p-4 mx-auto rounded-md bg-secondary-color w-fit">
                <h1 class="my-5 text-2xl font-semibold text-center text-white">Previously tracked days</h1>
            </div>
        </div>
    </div>
</x-app-layout>
