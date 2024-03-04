<div wire:poll.2s>
    <div class="flex items-center justify-between">
        <div>
            <h3 class="mb-6 text-3xl font-extrabold text-center text-white ">Your health data</h3>
        </div>
        <div class="mb-4">
            <button x-data x-on:click="$dispatch('open-modal', { name : 'calorie-calculation'})">
                @include('components.plus-button')
            </button>
        </div>
    </div>
    <div>
        <h1 class="mx-3 text-2xl font-bold text-white">Calorie goal: {{ $calorie_goal }}</h1>
    </div>

    <div class="grid grid-flow-row grid-cols-2 gap-6">
        <p class="p-4 text-2xl text-white">Age: <span
                class="ml-5 text-xl font-bold text-gray-300">{{ $age }}</span></p>
        <p class="p-4 text-2xl text-white">Gender: <span
                class="ml-5 text-xl font-bold text-gray-300">{{ $gender == 'male' ? 'Male' : 'Female' }}</span></p>
        <p class="p-4 text-2xl text-white">Height: <span
                class="ml-5 text-xl font-bold text-gray-300">{{ $height }} cm</p>
        <p class="p-4 text-2xl text-white">Current weight: <span
                class="ml-5 text-xl font-bold text-gray-300">{{ $current_weight }}
                kg</span></p>
        <p class="p-4 text-2xl text-white">Starting weight: <span
                class="ml-5 text-xl font-bold text-gray-300">{{ $starting_weight }}
                kg</span></p>
        <p class="p-4 text-2xl text-white">Weight goal: <span
                class="ml-5 text-xl font-bold text-gray-300">{{ $weight_goals[$weight_goal] }}</span></p>
    </div>
</div>
