<x-app-layout>    
    <div>
        <div class="flex flex-wrap justify-between gap-8 w-fit max-w-full mx-auto px-10 py-5 rounded-md bg-secondary-color shadow-lg shadow-gray-950">
            @foreach ($workoutPlans as $workoutPlan)
                {{-- card --}}
                <div class="h-60 w-80 relative rounded-xl overflow-hidden shadow-xl hover:shadow-action-hover transition duration-300 ease-in-out shadow-purple mx-7 my-6">
                    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset($workoutPlan->image_path) }}');"></div>
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                    <div class="absolute inset-0 flex flex-row justify-between align-top text-white">
                        <div class="px-6 py-4">
                            <div class="flex font-bold text-xl p-2 justify-center rounded-lg shadow-md bg-gradient-to-r from-purple to-action-hover">{{ $workoutPlan->title }}</div>
                        </div>
                        <div class="px-6 py-4 mt-1">
                            <div class="p-1 cursor-pointer bg-action-color rounded-full shadow-md hover:bg-action-hover transition duration-300 ease-in-out">
                                <a href="{{ route('workout-plans.show', $workoutPlan) }}" class="align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>