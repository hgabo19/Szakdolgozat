<div>
    <div class="relative flex">
        <h1 class="mb-5 ml-5 text-2xl font-semibold text-white lg:text-3xl lg:mx-auto mt-7">Food list for the day</h1>
        <div class="absolute end-0 top-6 lg:right-14 right-5">
            <button x-data x-on:click="$dispatch('open-modal', { name : 'meal-tracker'})">
                @include('components.plus-button')
            </button>
        </div>
    </div>
    <hr class="w-full h-1 mt-4 mb-8 border-0 bg-purple">
    <div class="overflow-y-auto lg:max-h-80 max-h-40 min-h-fit">
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
                                @include('components.trash-icon')
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
    <hr class="w-full h-0.5 mt-14 bg-purple border-0 ">
    <div class="flex justify-center">
        <h2 class="py-4 mx-6 mt-8 text-2xl font-extrabold text-white">Summary</h2>
    </div>

    {{-- SUMMARY TABLE --}}
    <div class="flex justify-center pb-8">
        <div class="relative overflow-x-auto md:w-fit sm:rounded-lg">
            <table class="text-sm text-gray-500 w-fit rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-600 uppercase bg-gray-50 dark:bg-action-color dark:text-white">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-xs md:text-base">
                            Calories (kcal)
                        </th>
                        <th scope="col" class="px-4 py-3 text-xs md:text-base">
                            Carbs (g)
                        </th>
                        <th scope="col" class="px-4 py-3 text-xs md:text-base">
                            Fat (g)
                        </th>
                        <th scope="col" class="px-4 py-3 text-xs md:text-base">
                            Protein (g)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white dark:bg-dark-charcoal">
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
