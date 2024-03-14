<x-app-layout>
    <div
        class="p-10 mx-auto my-10 transition duration-300 ease-in-out shadow-lg rounded-xl bg-dark-charcoal w-fit lg:w-5/6 hover:shadow-xl hover:shadow-emerald-600 shadow-emerald-600">
        <div class="flex items-center justify-between">
            <div
                class="p-1 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer bg-action-color hover:bg-action-hover">
                @can('manage', App\Models\WorkoutPlan::class)
                    <a href="{{ route('workout-plans.admin-list') }}" class="align-middle">
                        @include('components.back-arrow')
                    </a>
                @else
                    <a href="{{ route('workout-plans.index') }}" class="align-middle">
                        @include('components.back-arrow')
                    </a>
                @endcan
            </div>
            <div>
                <h1 class="text-3xl font-bold dark:text-white animate-fade_in_right">{{ $workoutPlan->title }}</h1>
            </div>
            @can('saveToUser', App\Models\WorkoutPlan::class)
                <div>
                    <form
                        action="{{ route('save.workout.plan', ['userId' => Auth::id(), 'workoutPlanId' => $workoutPlan->id]) }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        <div
                            class="p-2 transition duration-300 ease-in-out rounded-lg bg-action-color dark:focus:ring-white focus:outline-none focus:ring-2 focus:ring-white hover:bg-action-hover">
                            <button class="align-middle" type="submit">
                                <span class="text-xl text-white">Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div></div>
            @endcan
        </div>
        <div>
            <div class="w-full mt-8">

                <div class="w-full mb-8">
                    <p class="px-6 mt-10 mb-6 text-3xl font-bold text-white border-b-2 w-fit border-action-hover">
                        About
                    </p>
                    <div class="flex gap-5">
                        <img src="{{ asset('storage/' . $workoutPlan->image_path) }}" alt="{{ $workoutPlan->title }}"
                            class="mb-4 mr-10 rounded-lg max-h-40 lg:max-h-56 2xl:max-h-72">
                        <div class="flex flex-col w-full gap-10 h-fit">
                            <div class="flex justify-between animate-fade_in_right">
                                <p class="pt-2 text-2xl font-semibold text-white">Difficulty: <span
                                        class="px-4 font-extrabold text-transparent capitalize animate-fade_in_left bg-clip-text bg-gradient-to-t to-emerald-500 from-sky-400">{{ $workoutPlan->difficulty ? $workoutPlan->difficulty : 'General' }}</span>
                                </p>
                                <div class="flex mr-3">
                                    <span
                                        class="px-2 text-4xl font-extrabold text-transparent animate-fade_in_left bg-clip-text bg-gradient-to-r to-action-color from-sky-400">{{ $workoutPlan->duration }}</span>
                                    <p class="pt-1 text-2xl font-bold text-white ">day
                                        workout routine</p>
                                </div>
                            </div>
                            <div class="animate-fade_in_left">
                                <figure class="max-w-screen-md mx-auto text-center">
                                    <blockquote>
                                        <p class="text-2xl italic font-medium text-gray-900 dark:text-white">
                                            {{ $randomQuote['quote'] }}</p>
                                    </blockquote>
                                    <figcaption
                                        class="flex items-center justify-center mt-6 space-x-3 hiddejn rtl:space-x-reverse">
                                        <div
                                            class="flex items-center divide-x-2 divide-gray-500 rtl:divide-x-reverse dark:divide-gray-700">
                                            <p class="text-base font-bold text-gray-900 pe-3 dark:text-white">
                                                {{ $randomQuote['author'] }}</p>
                                            <p class="text-sm text-gray-500 ps-3 dark:text-gray-400">
                                                {{ $randomQuote['additionalInfo'] }}</p>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="px-4 mt-10 mb-6 text-3xl font-bold text-white border-b-2 w-fit border-action-hover">
                        Description
                    </p>
                    <p class="text-lg font-bold leading-loose text-white break-words indent-8 animate-fade_in_right">
                        {{ $workoutPlan->description }}
                    </p>
                </div>

                <p class="px-4 mt-16 mb-6 text-3xl font-bold text-white border-b-2 w-fit border-action-hover">
                    Exercises
                </p>

                <div
                    class="flex flex-col justify-center h-auto gap-5 mt-10 text-white rounded-lg lg:flex-wrap lg:flex-row lg:gap-14 animate-fade_in_up">
                    @foreach ($groupedExercises as $day => $dayExercises)
                        <div
                            class="px-5 border-t-2 rounded-lg shadow-md border-x-2 border-action-color shadow-sky-400 bg-secondary-color">
                            <h2
                                class="p-4 mt-5 text-2xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-t to-emerald-500 from-sky-400">
                                Day
                            </h2>
                            <div
                                class="flex justify-center text-6xl text-transparent bg-clip-text bg-gradient-to-t to-action-hover from-sky-400">
                                {{ $day }}
                            </div>
                            @foreach ($dayExercises as $muscleGroup => $exercises)
                                <div class="my-10">
                                    <h3
                                        class="text-xl text-center text-transparent bg-clip-text bg-gradient-to-t to-emerald-500 from-sky-400">
                                        Muscle group: <span
                                            class="font-extrabold capitalize">{{ $muscleGroup }}</span>
                                    </h3>
                                    @foreach ($exercises as $exercise)
                                        <div class="flex my-2 text-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-1 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                            </svg>
                                            <p class="capitalize">{{ $exercise['name'] }}</p>
                                            <p class="pl-6">{{ $exercise['sets'] }} sets</p>
                                            <p class="px-3">x</p>
                                            <p class="">{{ $exercise['reps'] }} reps</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
