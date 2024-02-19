<x-app-layout>
    <div class="w-fit lg:w-2/3 p-10 bg-white mx-auto">
        <div class="flex justify-between items-center">
            <div class="p-1 cursor-pointer bg-action-color rounded-full shadow-md hover:bg-action-hover transition duration-300 ease-in-out">
                <a href="{{ route('workout-plans.index')}}" class="align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                    </svg>
                </a>
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ $workoutPlan->title }}</h1>
            </div>
            @auth
                <div>
                    <form action="{{ route('save.workout.plan', ['userId' => Auth::id(),'workoutPlanId' => $workoutPlan->id]) }}" method="POST">
                        @csrf
                        <div class="rounded-full p-2 bg-action-color hover:bg-action-hover transition duration-300 ease-in-out">
                            <button class="align-middle" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white hover:text-gray-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            @endauth
        </div>
        <div>
            <div class="max-w-3xl mx-auto mt-8">
            
            <div class="mb-8 flex gap-6">
                <img src="{{ asset($workoutPlan->image_path) }}" alt="{{ $workoutPlan->title }}" class="mb-4 h-48 rounded-lg">
            </div>
    
            <div>
                <h2 class="text-xl my-4 font-semibold text-center">Description</h2>
                <p class="text-gray-600 mt-4 mb-8">{{ $workoutPlan->description }}</p>
            </div>
    
            <h2 class="text-xl font-semibold mb-4 text-center">Exercises</h2>
        
            <div>
                @foreach ($workoutPlan->exercises as $exercise)
                    <li class="mb-2">
                        <strong>{{ $exercise->name }}</strong>
                        <p class="text-gray-600">{{ $exercise->description }}</p>
                        <img src="{{ asset($exercise->image_path) }}" alt="{{ $exercise->name }}" class="mt-2 h-36 rounded-lg">
                    </li>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>