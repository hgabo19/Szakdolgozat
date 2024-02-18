<div>
    <div class="flex relative">
        <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Food list for the day</h1>
        <div class="absolute end-0 top-6 right-12">
            <button x-data x-on:click="$dispatch('open-modal', { name : 'meal-tracker'})">
                @include('components.plus-button')
            </button>
        </div>
    </div>
    <hr class="w-full h-1 mt-4 mb-8 bg-purple border-0">
    <div class="max-h-60 min-h-fit overflow-y-auto">
        @if (count($loggedMealsToday) == 0)
            <div class="font-medium text-lg text-white px-5 my-3 ml-5">
                Come on, add some food!
            </div>
        @else
            @foreach ($loggedMealsToday as $meal)
                <div wire:key="{{ $meal->id }}">
                    <div class="font-medium text-lg md:text-xl flex justify-between text-white px-5 my-3 ml-5">
                        <div>
                            {{ $meal->name }}
                        </div>
                        <div class="mr-6 p-1 cursor-pointer bg-red-500 rounded-full hover:bg-action-hover transition duration-300 ease-in-out">
                            <button class="align-middle" wire:click="deleteLoggedMeal({{ $meal->pivot->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr class="h-1 my-5 bg-purple border-0 w-30 mx-6">
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <hr class="w-full h-0.5 mt-6 bg-purple border-0 ">
    <div class="flex justify-center">
        <h2 class="font-extrabold text-2xl text-white mx-6 py-4 mt-8">Summary</h2>
    </div>

    {{-- SUMMARY TABLE --}}
    <div class="flex justify-center">
        <div class="relative md:w-fit overflow-x-auto sm:rounded-lg">
            <table class="w-fit text-sm rtl:text-right text-gray-500 dark:text-gray-400">
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
                    <tr class="dark:bg-secondary-color bg-white">
                        <th scope="row" class="px-6 py-4 md:text-lg text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $totalCalories }}
                        </th>
                        <td class="px-6 py-4 font-medium md:text-lg text-center text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $totalCarbonhydrates }}
                        </td>
                        <td class="px-6 py-4 font-medium md:text-lg text-center text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $totalFat }}
                        </td>
                        <td class="px-6 py-4 font-medium  md:text-lg text-center text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $totalProtein }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="flex">
        <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Previously tracked days</h1>
    </div>
</div>
