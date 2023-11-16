<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Exercises') }}
        </h1>
    </x-slot>
    
    <div>
        <div class="max-w-4xl mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">All Exercises</h1>

            @foreach ($exercises->groupBy('muscle_group') as $muscleGroup => $groupedExercises)
                <h2 class="text-xl font-semibold mb-2">{{ $muscleGroup }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($groupedExercises as $exercise)
                        <div class="bg-white p-4 rounded-md shadow-md">
                            <img src="{{ asset($exercise->image_path) }}" alt="{{ $exercise->name }}" class="mb-2 rounded-lg">
                            <h3 class="text-lg font-semibold">{{ $exercise->name }}</h3>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>