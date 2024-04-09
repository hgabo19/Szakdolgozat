<div class="flex flex-col gap-4">
    <form class="flex items-center">
        @csrf
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full mx-4 lg:w-1/3">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" wire:model.live.debounce.500ms ="search" id="simple-search" autocomplete="off"
                class="block w-full p-3 text-base text-gray-900 border-2 rounded-xl border-action-color bg-action-color focus:ring-blue-500 focus:border-blue-500 ps-10 dark:bg-dark-charcoal dark:border-action-color dark:placeholder-gray-300 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-500"
                placeholder="Search here..." required>
        </div>
    </form>

    <div class="relative overflow-x-auto lg:m-4 sm:rounded-lg max-w-fit">
        <table class="w-full min-w-full text-sm text-left text-gray-500 shadow-md rtl:text-right dark:text-gray-400">
            <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-action-color dark:text-white">
                <tr>
                    <th scope="col" class="px-2 py-3 lg:px-4">
                        Meal name
                    </th>
                    <th scope="col" class="px-2 py-3 lg:px-4">
                        Calories (kcal)
                    </th>
                    <th scope="col" class="px-2 py-3 lg:px-4">
                        Protein (g)
                    </th>
                    <th scope="col" class="px-2 py-3 lg:px-4">
                        Fat (g)
                    </th>
                    <th scope="col" class="px-2 py-3 lg:px-4">
                        Carbs (g)
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr wire:key="{{ $food->id }}"
                        class="odd:bg-white odd:dark:bg-dark-charcoal even:bg-gray-50 even:dark:bg-secondary-color">
                        <td scope="row"
                            class="px-4 py-1 font-medium text-gray-900 whitespace-pre-wrap dark:text-white">
                            <h1 class="text-base lg:text-lg">{{ $food->name }}</h1>
                        </td>
                        <td class="px-6 py-1 text-sm text-center lg:text-base">
                            <h2>{{ $food->calories }}</h2>
                        </td>
                        <td class="px-4 py-1 text-sm text-center lg:text-base">
                            <h2>{{ $food->protein }}</h2>
                        </td>
                        <td class="px-4 py-1 text-sm text-center lg:text-base">
                            <h2>{{ $food->fats }}</h2>
                        </td>
                        <td class="px-4 py-1 text-sm text-center lg:text-base">
                            <h2>{{ $food->carbonhydrates }}</h2>
                        </td>
                        <td class="px-4 py-1 lg:py-4">
                            <button wire:click="addFoodItem({{ $food->id }})" wire:loading.attr="disabled">
                                @include('components.plus-button')
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-10">
            {{ $foods->links() }}
        </div>
    </div>

    <div>
        <button x-data x-on:click="$dispatch('close-modal')" wire:click="saveFoodToUser"
            class="flex justify-center w-24 px-4 py-2 mx-auto mt-10 mb-5 text-xl font-semibold text-gray-200 rounded lg:mb-2 bg-action-color hover:bg-action-hover hover:text-white">
            Done
        </button>
    </div>
</div>
