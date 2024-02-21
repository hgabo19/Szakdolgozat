<div wire:poll.2s>
    <div class="absolute end-0 top-6 right-8">
        <button x-data x-on:click="$dispatch('open-modal', { name : 'calorie-calculation'})">
            @include('components.plus-button')
        </button>
    </div>
    <h3 class="px-4 mb-4 text-xl font-bold text-white">Your health data</h3>
    <div>
        <h1 class="mx-3 text-2xl font-bold text-white">Calorie goal: {{ $calorie_goal }}</h1>
    </div>

    <div class="grid grid-flow-row grid-cols-2 gap-6">
        <h1 class="p-4 text-lg text-white">Age: {{ $age }}</h1>
        <h1 class="p-4 text-lg text-white">Gender: {{ $gender == 'male' ? 'Male' : 'Female' }}</h1>
        <h1 class="p-4 text-lg text-white">Height: {{ $height }} cm</h1>
        <h1 class="p-4 text-lg text-white">Current weight: {{ $current_weight }} kg</h1>
        <h1 class="p-4 text-lg text-white">Starting weight: {{ $starting_weight }} kg</h1>
        <h1 class="p-4 text-lg text-white">Weight goal: {{ $weight_goals[$weight_goal] }}</h1>
    </div>
</div>
