<x-app-layout>
    <div
        class="w-4/5 mx-auto mb-10 transition duration-300 ease-in-out shadow-lg rounded-3xl bg-dark-charcoal hover:shadow-xl hover:shadow-action-color shadow-action-hover">
        <div class="w-3/4 p-4 mx-auto mt-8">
            <h1 class="my-10 text-4xl font-bold text-white mt">All Exercises</h1>

            @foreach ($exercises->groupBy('muscle_group') as $muscleGroup => $groupedExercises)
                <h2 class="mb-2 text-2xl font-semibold text-white capitalize">{{ $muscleGroup }}</h2>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($groupedExercises as $exercise)
                        <div class="mb-10 bg-white rounded-md shadow-md">
                            <img src="{{ asset($exercise->image_path) }}" alt="{{ $exercise->name }}">
                            <div class="p-2">
                                <h3 class="text-lg font-semibold">{{ $exercise->name }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (!$loop->last)
                    <hr class="w-full h-1 mt-4 mb-8 border-0 bg-action-color">
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
