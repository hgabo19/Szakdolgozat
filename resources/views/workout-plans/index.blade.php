<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workout plans') }}
        </h1>
    </x-slot>
    
    <div>
        <div class="flex flex-wrap justify-center">
            @foreach ($workoutPlans as $workoutPlan)
                {{-- card --}}
                <div class="max-w-xs rounded overflow-hidden shadow-xl mx-7 my-6">
                    <img class="w-full" src="{{ $workoutPlan->image_path }}" alt="{{ $workoutPlan->title }}">
                    <div class="px-6 py-4">
                        <div class="flex font-bold text-xl mb-2 justify-center">{{ $workoutPlan->title }}</div>
                    </div>
                    <div class="px-6 py-4 flex justify-center">
                        <a href="{{ route('workout-plans.show', $workoutPlan) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Check it
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>