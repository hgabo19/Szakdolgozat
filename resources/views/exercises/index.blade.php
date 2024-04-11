<x-app-layout>
    <div
        class="w-full p-5 mx-auto my-10 transition duration-300 ease-in-out shadow-lg lg:w-4/5 rounded-3xl bg-dark-charcoal hover:shadow-xl hover:shadow-sky-500 shadow-sky-600">
        <div class="w-full lg:p-4">
            <h1 class="my-5 text-2xl font-bold text-center text-white lg:my-10 lg:text-5xl mt">All Exercises</h1>

            @foreach ($exercises->groupBy('muscle_group') as $muscleGroup => $groupedExercises)
                <p
                    class="pb-6 text-xl font-extrabold text-transparent capitalize lg:text-4xl lg:px-6 animate-fade_in_left bg-clip-text bg-gradient-to-t to-emerald-500 from-sky-400">
                    {{ $muscleGroup }}
                </p>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($groupedExercises as $exercise)
                        <a href="{{ route('exercises.show', $exercise) }}">
                            <div
                                class="relative overflow-hidden transition duration-300 ease-in-out border-x-2 border-t-2 border-sky-500 rounded-md shadow-md animate-[fade-in-up_2s_ease-in-out] bg-secondary-color hover:shadow-sky-500 shadow-sky-600 hover:shadow-lg">
                                <img src="{{ asset('storage/' . $exercise->image_path) }}" alt="{{ $exercise->name }}"
                                    class="object-cover w-full h-32 opacity-80 rounded-t-md sm:h-48">
                                <div class="my-2">
                                    <span class="p-2 text-base font-semibold text-white lg:text-lg">
                                        {{ $exercise->name }}
                                    </span>
                                </div>
                                <div>
                                    <span
                                        class="absolute top-0 px-3 py-2 mt-3 ml-3 text-sm font-bold text-white capitalize border-2 rounded-full lg:text-lg border-sky-300 bg-sky-600">
                                        {{ $exercise->muscle_group }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                @if (!$loop->last)
                    <hr class="w-full h-1 my-16 border-0 bg-action-color">
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
