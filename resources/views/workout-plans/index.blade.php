<x-app-layout>
    <div
        class="p-10 mx-auto my-10 transition duration-300 ease-in-out shadow-lg rounded-xl bg-dark-charcoal w-fit lg:w-11/12 hover:shadow-xl hover:shadow-emerald-600 shadow-emerald-600">
        <div class="py-5">
            <h1 class="mb-5 text-5xl font-extrabold text-center text-white">Workout plans</h1>
            <div class="gap-16 p-2 lg:grid gap-y-20 lg:grid-cols-3">
                @foreach ($workoutPlans as $workoutPlan)
                    <a href="{{ route('workout-plans.show', $workoutPlan) }}">
                        <div
                            class="relative overflow-hidden transition duration-300 ease-in-out border-x-2 border-t-2 border-emerald-600 rounded-md shadow-md animate-[fade-in-up_2s_ease-in-out] bg-secondary-color hover:shadow-emerald-400 hover:shadow-lg shadow-emerald-600">
                            <img src="{{ asset('storage/' . $workoutPlan->image_path) }}" alt="kep"
                                class="object-cover w-full h-32 opacity-80 rounded-t-md sm:h-48">
                            <div class="my-2">
                                <span class="p-2 text-lg font-semibold text-white">
                                    {{ $workoutPlan->title }}
                                </span>
                            </div>
                            <div>
                                <span
                                    class="absolute top-0 p-2 mt-3 ml-3 text-base font-bold text-white capitalize border-2 rounded-full border-violet-400 bg-action-hover">{{ $workoutPlan->difficulty }}</span>
                            </div>
                            <div>
                                <span
                                    class="absolute top-0 right-0 p-2 mt-3 mr-3 text-base font-bold text-white capitalize border-2 rounded-full border-violet-400 bg-action-hover">{{ $workoutPlan->duration }}
                                    day</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
