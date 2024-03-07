<x-app-layout>
    <div class="p-10 mx-auto bg-white w-fit lg:w-2/3">
        <div class="flex items-center justify-between">
            <div
                class="p-1 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer bg-action-color hover:bg-action-hover">
                <a href="{{ route('workout-plans.index') }}" class="align-middle">
                    @include('components.back-arrow')
                </a>
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ $workoutPlan->title }}</h1>
            </div>
            @auth
                <div>
                    <form
                        action="{{ route('save.workout.plan', ['userId' => Auth::id(), 'workoutPlanId' => $workoutPlan->id]) }}"
                        method="POST">
                        @csrf
                        <div
                            class="p-2 transition duration-300 ease-in-out rounded-full bg-action-color hover:bg-action-hover">
                            <button class="align-middle" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white hover:text-gray-300">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            @endauth
        </div>
        <div>
            <div class="max-w-3xl mx-auto mt-8">

                <div class="flex gap-6 mb-8">
                    <img src="{{ asset($workoutPlan->image_path) }}" alt="{{ $workoutPlan->title }}"
                        class="h-48 mb-4 rounded-lg">
                </div>

                <div>
                    <h2 class="my-4 text-xl font-semibold text-center">Description</h2>
                    <p class="mt-4 mb-8 text-gray-600">{{ $workoutPlan->description }}</p>
                </div>

                <h2 class="mb-4 text-xl font-semibold text-center">Exercises</h2>

                <div>
                    @foreach ($workoutPlan->exercises as $exercise)
                        <li class="mb-2">
                            <strong>{{ $exercise->name }}</strong>
                            <p class="text-gray-600">{{ $exercise->description }}</p>
                            <img src="{{ asset($exercise->image_path) }}" alt="{{ $exercise->name }}"
                                class="mt-2 rounded-lg h-36">
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
