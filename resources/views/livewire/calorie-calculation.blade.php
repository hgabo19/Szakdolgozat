<div>
    <h3 class="text-gray-100 flex justify-center mt-8 text-xl">Calculate your needed calorie intake</h3>
    <form class="p-6 space-y-4" wire:submit='saveCalories' action="">
        @csrf
        <div class="grid grid-cols-2 gap-6">
            <div class="flex mx-auto flex-col">
                <div class="mx-auto">
                    <label for="gender" class="text-gray-100 block mx-2 mt-7">Gender</label>
                </div>
                <select wire:model.blur='gender' name="gender" id="gender" class="rounder border border-gray-200 pl-4 pr-10 m-2 w-fit">
                    <option value="" selected hidden>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <span class="text-red-500 text-xs block ml-3"> {{ $message }} </span>
                @enderror
            </div>
            
            <div class="flex mx-auto flex-col">
                <div class="mx-auto">
                    <label for="age" class="text-gray-100 block mx-2 mt-7">Age</label>
                </div>
                <input wire:model.blur='age' type="number" name="age" id="age" min="10" max="100" placeholder="20" class="rounder border border-gray-200 p-3 m-2 w-fit">
                @error('age')
                    <span class="text-red-500 text-xs block ml-3"> {{ $message }} </span>
                @enderror
            </div>
            
            <div class="flex mx-auto flex-col">
                <div class="mx-auto">
                    <label for="weight" class="text-gray-100 block mx-2 mt-7">Weight in kg</label>
                </div>
                <input wire:model.blur='weight' type="number" name="weight" id="weight" min="35" max="300" placeholder="60" class="rounder border border-gray-200 p-3 m-2 w-fit">
                @error('weight')
                    <span class="text-red-500 text-xs block ml-3"> {{ $message }} </span>
                @enderror
            </div>
            
            <div class="flex mx-auto flex-col">
                <div class="mx-auto">
                    <label for="height" class="text-gray-100 block mx-2 mt-7">Height in cm</label>
                </div>
                <input wire:model.blur='height' type="number" name="height" id="height" min="100" max="220" placeholder="160" class="rounder border border-gray-200 p-3 m-2 w-fit">
                @error('height')
                    <span class="text-red-500 text-xs block ml-3"> {{ $message }} </span>
                @enderror
            </div>
            
            <div class="flex mx-auto flex-col">
                <div class="mx-auto">
                    <label for="activity_level" class="text-gray-100 block mx-2 mt-7">Activity level</label>
                </div>
                <select wire:model.blur='activity_level' name="activity_level" id="activity_level" class="rounder border border-gray-200 pl-4 pr-10 m-2 w-fit">
                    <option value="" selected hidden>Select your activity level</option>
                    <option value="lightly_active">Lightly active</option>
                    <option value="moderately_active">Moderately active</option>
                    <option value="very_active">Very active</option>
                </select>
                @error('activity_level')
                    <span class="text-red-500 text-xs block ml-3"> {{ $message }} </span>
                @enderror
            </div>
            
            <div class="flex mx-auto flex-col">
                <div class="mx-auto">
                    <label for="weight_goal" class="text-gray-100 block mx-2 mt-7">Weight goal</label>
                </div>
                <select wire:model.blur='weight_goal' name="weight_goal" id="weight_goal" class="rounder border border-gray-200 pl-4 pr-10 m-2 w-fit">
                    <option value="" selected hidden>Select your weight goal</option>
                    <option value="weight_loss">Lose weight </option>
                    <option value="maintenance">Maintain weight </option>
                    <option value="weight_gain">Gain weight </option>
                </select>
                @error('weight_goal')
                    <span class="text-red-500 text-xs block ml-3"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="flex">
            <button class="rounder border border-gray-500 px-5 py-4 my-5 mx-auto w-fit text-white bg-blue-950 hover:bg-blue-700 rounded-lg">Calculate</button>
        </div>
    </form>
</div>
