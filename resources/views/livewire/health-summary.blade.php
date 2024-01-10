<div>
    <div>
        <h3 class="text-lg text-gray-100 font-bold mb-4">Your health data</h3>
        <div>
            <h1 class="text-2xl text-gray-100 font-bold mx-3">Calorie goal: {{ $calorie_goal }}</h1>
        </div>
        <div class="grid grid-flow-row grid-cols-2 gap-6">
            <h1 class="p-4 text-lg text-gray-100">Age: {{ $age }}</h1>
            <h1 class="p-4 text-lg text-gray-100">Gender: {{ $gender }}</h1>
            <h1 class="p-4 text-lg text-gray-100">Height: {{ $height }}</h1>
            <h1 class="p-4 text-lg text-gray-100">Current weight: {{ $current_weight }}</h1>
            <h1 class="p-4 text-lg text-gray-100">Starting weight: {{ $starting_weight }}</h1>
            <h1 class="p-4 text-lg text-gray-100">Weight goal: {{ $weight_goal }}</h1>
        </div>
    </div>    
</div>
