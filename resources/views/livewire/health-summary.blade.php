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
            <h1 class="mx-3 my-3 text-xl font-bold text-center text-white lg:my-0 lg:text-2xl">Calorie goal:
                {{ $this->user->calorie_goal }}</h1>
        </div>

        <div class="grid grid-flow-row grid-cols-2 gap-2 text-xl lg:text-2xl lg:gap-6">
            <p class="p-4 font-bold text-white">Age: <span
                    class="ml-5 text-base font-bold text-gray-300 lg:text-xl">{{ $this->user->age }}</span></p>
            <p class="p-4 font-bold text-white">Gender: <span
                    class="ml-5 text-base font-bold text-gray-300 lg:text-xl">{{ $this->user->gender == 'male' ? 'Male' : 'Female' }}</span>
            </p>
            <p class="p-4 font-bold text-white">Height: <span
                    class="ml-5 text-base font-bold text-gray-300 lg:text-xl">{{ $this->user->height }} cm</p>
            <p class="p-4 font-bold text-white">Weight goal: <span
                    class="block text-base font-bold text-gray-300 lg:inline-block lg:ml-5 lg:text-xl">{{ $weight_goals[$this->user->weight_goal] }}</span>
            </p>
            <p class="p-4 font-bold text-white">
                Starting weight:
                <span class="ml-5 text-base font-bold text-gray-300 lg:text-xl">{{ $this->user->starting_weight }}
                    kg
                </span>
            </p>
            <p class="p-4 font-bold text-white">
                Current weight:
                <span class="ml-5 text-base font-bold text-gray-300 lg:text-xl">{{ $this->user->weight }}
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
