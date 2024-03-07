<x-app-layout>
    <div>
        <div
            class="flex flex-wrap justify-between max-w-full gap-8 px-10 py-5 mx-auto rounded-md shadow-lg w-fit bg-secondary-color shadow-gray-950">
            @foreach ($workoutPlans as $workoutPlan)
                {{-- card --}}
                <div
                    class="relative my-6 overflow-hidden transition duration-300 ease-in-out shadow-xl h-60 w-80 rounded-xl hover:shadow-action-hover shadow-purple mx-7">
                    <div class="absolute inset-0 bg-center bg-no-repeat bg-cover"
                        style="background-image: url('{{ asset($workoutPlan->image_path) }}');"></div>
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                    <div class="absolute inset-0 flex flex-row justify-between text-white align-top">
                        <div class="px-6 py-4">
                            <div
                                class="flex justify-center p-2 text-xl font-bold rounded-lg shadow-md bg-gradient-to-r from-purple to-action-hover">
                                {{ $workoutPlan->title }}</div>
                        </div>
                        <div class="px-6 py-4 mt-1">
                            <div
                                class="p-1 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer bg-action-color hover:bg-action-hover">
                                <a href="{{ route('workout-plans.show', $workoutPlan) }}" class="align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <a class="p-4 text-white border-2 border-gray-50" href="{{ route('workout-plans.admin-list') }}">
        list
    </a> --}}
</x-app-layout>
