<x-app-layout>
    <div class="container mt-5 lg:mx-auto lg:grid lg:grid-cols-2 lg:gap-5">
        <x-custom-modal name="calorie-calculation">
            <x-slot:body>
                <livewire:calorie-calculation>
            </x-slot:body>
        </x-custom-modal>

        <div class="m-4">
            <div
                class="w-full mx-auto mb-6 transition duration-300 ease-in-out shadow-lg hover:shadow-xl hover:shadow-action-color shadow-action-hover">
                <div class="relative w-full p-6 bg-dark-charcoal h-fit">
                    <livewire:health-summary>
                </div>
            </div>
        </div>

        <div class="row-span-2">
            @include('health.calories')
        </div>

        {{-- graph --}}
        <div class="m-4">
            <div
                class="container px-10 mx-auto mb-4 transition duration-300 ease-in-out border border-none shadow-lg bg-dark-charcoal content max-w-3/2 lg:w-full w-fit hover:shadow-xl hover:shadow-action-color shadow-action-hover">
                <div class="flex flex-col">
                    <h1 class="mx-auto my-5 text-3xl font-extrabold text-white">Daily calorie count</h1>
                    <livewire:calorie-graph>
                </div>
            </div>
        </div>
        <div class="col-span-2 mx-4 mb-10">
            <div
                class="p-5 transition duration-300 ease-in-out rounded shadow-lg lg:w-full w-fit lg:mx-auto bg-dark-charcoal hover:shadow-xl hover:shadow-action-color shadow-action-hover">
                <div>
                    <h1 class="text-3xl font-extrabold text-white">Weekly nutrition intake</h1>
                    <h2 class="mt-3 text-xl font-extrabold text-white">{{ $startOfWeek->format('Y-m-d') }} <span
                            class="mx-4">-</span>
                        {{ $endOfWeek->format('Y-m-d') }}</h2>
                </div>
                {!! $chart->container() !!}
            </div>
        </div>
        <div class="col-span-2 mx-4 mb-10">
            <div
                class="p-5 transition duration-300 ease-in-out rounded shadow-lg lg:w-full w-fit lg:mx-auto bg-dark-charcoal hover:shadow-xl hover:shadow-action-color shadow-action-hover">
                <div>
                    <h1 class="text-3xl font-extrabold text-white">Weekly calorie intake</h1>
                    <h2 class="mt-3 text-xl font-extrabold text-white">{{ $startOfWeek->format('Y-m-d') }} <span
                            class="mx-4">-</span>
                        {{ $endOfWeek->format('Y-m-d') }}</h2>
                </div>
                {!! $linechart->container() !!}
            </div>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    {{ $linechart->script() }}
</x-app-layout>
