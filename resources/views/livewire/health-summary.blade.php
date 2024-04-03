<div class="rounded-md">
    <div class="md:flex md:items-center md:justify-between">
        <div>
            <h3 class="mb-6 text-lg font-extrabold text-center text-white md:text-4xl ">Your health data</h3>
        </div>
        <div class="flex justify-center mb-4 md:flex-none">
            <button x-data x-on:click="$dispatch('open-modal', { name : 'calorie-calculation'})"
                class="{{ !$this->user->calorie_goal ? 'animate-pulse' : '' }}">
                @include('components.plus-button')
            </button>
        </div>
    </div>
    @if ($this->user->calorie_goal)
        <div>
            <h1 class="mx-3 text-2xl font-bold text-white">Calorie goal: {{ $this->user->calorie_goal }}</h1>
        </div>

        <div class="grid grid-flow-row grid-cols-2 gap-6">
            <p class="p-4 text-2xl font-bold text-white">Age: <span
                    class="ml-5 text-xl font-bold text-gray-300">{{ $this->user->age }}</span></p>
            <p class="p-4 text-2xl font-bold text-white">Gender: <span
                    class="ml-5 text-xl font-bold text-gray-300">{{ $this->user->gender == 'male' ? 'Male' : 'Female' }}</span>
            </p>
            <p class="p-4 text-2xl font-bold text-white">Height: <span
                    class="ml-5 text-xl font-bold text-gray-300">{{ $this->user->height }} cm</p>
            <p class="p-4 text-2xl font-bold text-white">Weight goal: <span
                    class="ml-5 text-xl font-bold text-gray-300">{{ $weight_goals[$this->user->weight_goal] }}</span>
            </p>
            <p class="p-4 text-2xl font-bold text-white">
                Starting weight:
                <span class="ml-5 text-xl font-bold text-gray-300">{{ $this->user->starting_weight }}
                    kg
                </span>
            </p>
            <p class="p-4 text-2xl font-bold text-white">
                Current weight:
                <span class="ml-5 text-xl font-bold text-gray-300">{{ $this->user->weight }}
                    kg
                </span>
            </p>
        </div>
    @else
        <div>
            <h1 class="mx-3 text-lg font-bold text-center text-white animate-pulse md:mt-10 md:text-3xl">Press + to
                start
                your
                journey!</h1>
        </div>
    @endif
</div>
