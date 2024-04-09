<div class="relative px-10 ">
    <h1 class="flex justify-center p-1 mt-8 text-lg text-white md:text-4xl">
        {{ Auth::user()->calorie_goal ? 'Update your health data' : 'Calculate your health data' }}
    </h1>
    <div class="w-fit">
        <div
            class="absolute top-0 p-1 transition duration-300 ease-in-out rounded-full right-4 md:right-6 bg-action-color hover:bg-action-hover">
            <button x-data x-on:click="$dispatch('close-modal')" class="align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"
                    class="md:w-10 w-7 h-7 md:h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <form class="p-6 space-y-4" wire:submit='saveCalories' method="POST">
        @csrf
        <div class="flex flex-col gap-10 md:grid md:grid-cols-2 ">
            <div class="md:px-10">
                <label for="gender" class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">
                    Gender
                </label>
                <select wire:model.blur='gender' name="gender" id="gender"
                    class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-fit bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                    <option value="" selected hidden>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <span class="block ml-3 text-base text-red-500"> {{ $message }} </span>
                @enderror
            </div>

            <div class="md:px-10">
                <label for="age"
                    class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Age</label>
                <input wire:model.blur='age' type="number" name="age" id="age" min="10" max="100"
                    placeholder="20"
                    class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-1/2 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                @error('age')
                    <span class="block ml-3 text-base text-red-500"> {{ $message }} </span>
                @enderror
            </div>

            <div class="md:px-10">
                <label for="weight"
                    class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Weight in
                    kg</label>
                <input wire:model.blur='weight' type="number" name="weight" id="weight" min="35"
                    max="300" placeholder="60"
                    class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-1/2 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                @error('weight')
                    <span class="block ml-3 text-xs text-red-500"> {{ $message }} </span>
                @enderror
            </div>

            <div class="md:px-10">
                <label for="height" class="block mb-2 font-medium text-gray-900 md:text-xl dark:text-white">
                    Height in cm</label>
                <input wire:model.blur='height' type="number" name="height" id="height" min="100"
                    max="220" placeholder="160"
                    class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-1/2 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                @error('height')
                    <span class="block ml-3 text-xs text-red-500"> {{ $message }} </span>
                @enderror
            </div>

            <div class="md:px-10">
                <label for="activity_level"
                    class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Activity
                    level</label>
                <select wire:model.blur='activity_level' name="activity_level" id="activity_level"
                    class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-fit bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                    <option value="" selected hidden>Select your activity level</option>
                    <option value="lightly_active">Lightly active</option>
                    <option value="moderately_active">Moderately active</option>
                    <option value="very_active">Very active</option>
                </select>
                @error('activity_level')
                    <span class="block ml-3 text-xs text-red-500"> {{ $message }} </span>
                @enderror
            </div>

            <div class="md:px-10">
                <label for="weight_goal"
                    class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Weight
                    goal</label>
                <select wire:model.blur='weight_goal' name="weight_goal" id="weight_goal"
                    class="block w-full p-3 text-base text-gray-900 border border-gray-300 rounded-lg md:text-lg md:w-fit bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                    <option value="" selected hidden>Select your weight goal</option>
                    <option value="weight_loss">Lose weight </option>
                    <option value="maintenance">Maintain weight </option>
                    <option value="weight_gain">Gain weight </option>
                </select>
                @error('weight_goal')
                    <span class="block ml-3 text-xs text-red-500"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="flex justify-center pt-8">
            <button
                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-base md:text-2xl font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-action-color to-action-hover group-hover:from-action-hover group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 dark:focus:ring-white">
                <span
                    class="relative px-6 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-dark-charcoal rounded-md group-hover:bg-opacity-0">
                    Calculate
                </span>
            </button>
        </div>
    </form>
</div>
