<x-app-layout>
    <div
        class="w-full p-2 mx-auto my-10 transition duration-300 ease-in-out shadow-lg lg:w-4/5 bg-dark-charcoal lg:rounded-xl hover:shadow-xl hover:shadow-purple shadow-purple">
        <div class="p-4 text-center">
            <h1 class="my-5 text-xl font-extrabold text-white lg:text-4xl">Workout plans</h1>
        </div>

        <div class="w-full pb-16">
            <div class="relative w-full mx-auto mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                <table
                    class="w-full min-w-full text-sm text-left text-gray-500 shadow-md rtl:text-right dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-action-color dark:text-white">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                Title
                            </th>
                            <th scope="col" class="w-8 px-4 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-4 py-3 text-center">
                                Duration
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Difficulty
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workoutPlans as $workoutPlan)
                            <tr wire:key="{{ $workoutPlan->id }}"
                                class="border-b-2 odd:bg-white odd:dark:bg-secondary-color border-action-color even:bg-gray-50 even:dark:bg-secondary-color">
                                <td scope="row"
                                    class="max-w-[15rem] px-4 py-4 font-medium text-gray-900 break-words dark:text-white">
                                    <h1 class="text-base">{{ $workoutPlan->title }}</h1>
                                </td>
                                <td class="px-6 py-4 text-base">
                                    <h2 class="max-w-[15rem] truncate">{{ $workoutPlan->description }}</h2>
                                </td>
                                <td class="px-4 py-4 text-base text-center">
                                    <h2>{{ $workoutPlan->duration }} days</h2>
                                </td>
                                @if ($workoutPlan->difficulty)
                                    <td class="px-4 py-4 text-base capitalize">
                                        <h2>{{ $workoutPlan->difficulty }}</h2>
                                    </td>
                                @else
                                    <td class="px-4 py-4 text-base">
                                        <h2>General</h2>
                                    </td>
                                @endif
                                <td class="py-4">
                                    <button type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-white font-medium rounded-full text-base px-5 py-2.5 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-white">
                                        @include('components.edit-icon')
                                    </button>
                                </td>
                                <td class="py-4">
                                    <button type="button"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-white font-medium rounded-full text-base px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="black" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="py-4">
                                    <button type="button"
                                        class="text-white bg-action-color hover:bg-action-hover focus:outline-none focus:right-2 focus:ring-white font-medium rounded-full text-base px-5 py-2.5 text-center dark:bg-action-color dark:hover:bg-action-hover dark:focus:ring-white">
                                        @include('components.view-icon')
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-10">
                    {{ $workoutPlans->links() }}
                </div>
            </div>

        </div>
        <div class="flex justify-center p-2 mb-5">
            <button type="button"
                class="text-white bg-action-color hover:bg-action-hover focus:outline-none focus:ring-2 focus:ring-white font-bold rounded-full text-xl px-6 py-2.5 text-center mb-2 dark:bg-action-color dark:hover:bg-action-hover dark:focus:ring-white">
                <a href="{{ route('workout-plans.create') }}">
                    Add new
                </a>
            </button>
        </div>
    </div>
</x-app-layout>
