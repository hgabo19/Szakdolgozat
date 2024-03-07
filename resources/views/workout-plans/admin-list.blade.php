<x-app-layout>
    <div
        class="w-full p-2 mx-auto my-10 transition duration-300 ease-in-out shadow-lg lg:w-4/5 bg-dark-charcoal lg:rounded-xl hover:shadow-xl hover:shadow-action-color shadow-action-hover">
        <div class="p-4 text-center">
            <h1 class="my-5 text-xl font-extrabold text-white lg:text-4xl">Workout plans</h1>
        </div>

        <div class="w-full pb-16">
            <div class="relative w-11/12 mx-auto mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                <table
                    class="w-full min-w-full text-sm text-left text-gray-500 shadow-md rtl:text-right dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-action-color dark:text-white">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Duration
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Difficulty
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
                                class="odd:bg-white odd:dark:bg-secondary-color odd:border-b-2 odd:border-action-color even:bg-gray-50 even:dark:bg-secondary-color">
                                <td scope="row"
                                    class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <h1 class="text-lg">{{ $workoutPlan->title }}</h1>
                                </td>
                                <td class="px-6 py-4 overflow-hidden text-base">
                                    <h2>{{ $workoutPlan->description }}</h2>
                                </td>
                                <td class="px-4 py-4 text-base">
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
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-white font-medium rounded-full text-base px-7 py-2.5 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-white">
                                        Edit
                                    </button>
                                </td>
                                <td class="py-4">
                                    <button type="button"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-white font-medium rounded-full text-base px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-white">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
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
