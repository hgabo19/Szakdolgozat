<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workout plan name') }}   
        </h1>
    </x-slot>
    
    <div>
        <div class="max-w-3xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">{{ $workoutPlan->title }}</h1>
        
        <div class="mb-8">
            <img src="{{ asset($workoutPlan->image_path) }}" alt="{{ $workoutPlan->title }}" class="mb-4 h-48 rounded-lg">
            <h2 class="text-xl font-semibold">Leiras</h2>
            <p class="text-gray-600 my-4">{{ $workoutPlan->description }}</p>
        </div>

        <h2 class="text-xl font-semibold mb-4">Exercises</h2>
    
        <div class="">
            @foreach ($workoutPlan->exercises as $exercise)
                <li class="mb-2">
                    <strong>{{ $exercise->name }}</strong>
                    <p class="text-gray-600">{{ $exercise->description }}</p>
                    <img src="{{ asset($exercise->image_path) }}" alt="{{ $exercise->name }}" class="mt-2 h-36 rounded-lg">
                </li>
            @endforeach
        </div>
    </div>
</x-app-layout>