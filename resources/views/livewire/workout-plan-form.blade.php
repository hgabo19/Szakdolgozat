<div>
    <div
        class="w-full p-2 mx-auto my-10 transition duration-300 ease-in-out shadow-lg lg:w-4/5 bg-dark-charcoal lg:rounded-xl hover:shadow-xl hover:shadow-action-color shadow-action-hover">
        <div
            class="p-1 mx-3 mt-3 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer bg-action-color hover:bg-action-hover w-fit">
            <a href="{{ route('workout-plans.admin-list') }}" class="align-middle">
                @include('components.back-arrow')
            </a>
        </div>
        <div class="p-4 text-center">

            <h1 class="mb-5 text-xl font-extrabold text-white lg:text-4xl">Create the new plan</h1>
        </div>

        <div class="w-4/5 p-6 mx-auto mb-8 rounded-xl bg-secondary-color">
            <form wire:submit.prevent="save">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model="title" type="text" name="floating_title" id="floating_title"
                        class="block py-2.5 px-0 w-2/3 text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_title"
                        class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Title
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="difficulty" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">
                        Difficulty
                    </label>
                    <select id="difficulty" wire:model="difficulty"
                        class="bg-transparent border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/3 p-2.5 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color">
                        <option selected value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="days" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">
                        Number of training days
                    </label>
                    <div class="flex gap-5">
                        <input
                            class="bg-transparent border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/3 p-2.5 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color"
                            type="number" wire:model="numberOfDays" min="2" max="5" placeholder="3">
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            wire:click.prevent="setDays">
                            Set
                        </button>
                    </div>

                </div>
                <div>
                    @foreach ($days as $dayIndex => $day)
                        <div>
                            <div>
                                <h1 class="text-white">Day {{ $dayIndex + 1 }}</h1>
                            </div>
                            <button
                                class="text-white my-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                wire:click.prevent="addExercise({{ $dayIndex }})">
                                Add Exercise
                            </button>
                            <div class="md:flex md:flex-wrap md:gap-14">
                                @foreach ($day['exercises'] as $addedExerciseIndex => $addedExercise)
                                    <div class="flex w-1/3 gap-4">
                                        <div>
                                            <label for="exercise"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">
                                                Exercise {{ $addedExerciseIndex + 1 }}
                                            </label>
                                            <select id="exercise"
                                                wire:model="days.{{ $dayIndex }}.exercises.{{ $addedExerciseIndex }}.name"
                                                class="bg-transparent overflow-y-scroll border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block max-w-fit min-w-fit p-2.5 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color">
                                                <option default value="" hidden>Choose an exercise
                                                </option>
                                                @foreach ($all_exercises as $exerciseIndex => $exercise)
                                                    <option value="{{ $exercise->id }}">{{ $exercise->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="sets"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">
                                                Sets
                                            </label>
                                            <input wire:model="sets"
                                                class="bg-transparent border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color"
                                                type="number" min="2" max="10" placeholder="3">
                                        </div>
                                        <div>
                                            <label for="reps"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">
                                                Reps
                                            </label>
                                            <input wire:model="reps"
                                                class="bg-transparent border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color"
                                                type="number" min="5" max="25" placeholder="5">
                                        </div>
                                        @if (!$loop->first)
                                            <div
                                                class="p-1 transition duration-300 ease-in-out bg-red-500 rounded-full cursor-pointer hover:bg-action-hover">
                                                <button class="align-middle"
                                                    wire:click.prevent="deleteExercise({{ $dayIndex }},{{ $addedExerciseIndex }})">
                                                    @include('components.trash-icon')
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <hr class="w-full h-1 my-10 border-0 bg-purple ">
                        </div>
                    @endforeach
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
