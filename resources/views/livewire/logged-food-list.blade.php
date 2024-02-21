<div>
    <div class="relative flex">
        <h1 class="mx-auto mb-5 text-2xl font-semibold text-white mt-7">Food list for the day</h1>
        <div class="absolute end-0 top-6 right-12">
            <button x-data x-on:click="$dispatch('open-modal', { name : 'meal-tracker'})">
                @include('components.plus-button')
            </button>
        </div>
    </div>
    <hr class="w-full h-1 mt-4 mb-8 border-0 bg-purple">
    <div class="overflow-y-auto max-h-60 min-h-fit">
        @if (count($loggedMealsToday) == 0)
            <div class="px-5 my-3 ml-5 text-2xl font-bold text-white">
                Come on, add some food!
            </div>
        @else
            @foreach ($loggedMealsToday as $meal)
                <div wire:key="{{ $meal->id }}">
                    <div class="flex justify-between px-5 my-1 ml-3 text-lg font-medium text-white md:text-xl">
                        <div>
                            {{ $meal->name }}
                        </div>
                        <div
                            class="p-1 transition duration-300 ease-in-out bg-red-500 rounded-full cursor-pointer mr-7 hover:bg-action-hover">
                            <button class="align-middle" wire:click="deleteLoggedMeal({{ $meal->pivot->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="black" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr class="h-1 mx-6 my-5 border-0 bg-purple w-30">
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <hr class="w-full h-0.5 mt-6 bg-purple border-0 ">
    <div class="flex justify-center">
        <h2 class="py-4 mx-6 mt-8 text-2xl font-extrabold text-white">Summary</h2>
    </div>

    {{-- SUMMARY TABLE --}}
    <div class="flex justify-center pb-5">
        <div class="relative overflow-x-auto md:w-fit sm:rounded-lg">
            <table class="text-sm text-gray-500 w-fit rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-600 uppercase bg-gray-50 dark:bg-action-color dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs md:text-base">
                            Calories
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs md:text-base">
                            Carbonhydrates
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs md:text-base">
                            Fat
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs md:text-base">
                            Protein
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white dark:bg-secondary-color">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-center text-gray-900 md:text-lg whitespace-nowrap dark:text-white">
                            {{ $totalCalories }}
                        </th>
                        <td
                            class="px-6 py-4 font-medium text-center text-gray-900 md:text-lg whitespace-nowrap dark:text-white">
                            {{ $totalCarbonhydrates }}
                        </td>
                        <td
                            class="px-6 py-4 font-medium text-center text-gray-900 md:text-lg whitespace-nowrap dark:text-white">
                            {{ $totalFat }}
                        </td>
                        <td
                            class="px-6 py-4 font-medium text-center text-gray-900 md:text-lg whitespace-nowrap dark:text-white">
                            {{ $totalProtein }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
