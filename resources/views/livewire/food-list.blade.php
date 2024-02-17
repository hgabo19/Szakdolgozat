<div class="flex flex-col gap-4">
    <form class="flex items-center">   
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-1/2 ml-4">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" wire:model.live.debounce.500ms ="search" id="simple-search" autocomplete="off" class="bg-gray-50 border border-gray-300
                text-gray-900 text-base rounded-lg focus:ring-blue-500 
                focus:border-blue-500 block w-full ps-10 p-3 dark:bg-gray-900
                dark:border-white dark:placeholder-gray-400 dark:text-gray-200 
                dark:focus:ring-indigo-600 dark:focus:border-indigo-500" 
                placeholder="Search here..." required>
        </div>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4 max-w-fit">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md min-w-full">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Meal name
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Calories
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Protein
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Fats
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Carbonhydrates
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr wire:key="{{ $food->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                        <td scope="row" class="px-8 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <h1>{{ $food->name }}</h1>
                            <h1>{{ $food->id }}</h1>
                        </td>
                        <td class="px-6 py-4">
                            <h2>{{ $food->calories }}</h2> 
                        </td>
                        <td class="px-4 py-4">
                            <h2>{{ $food->protein }}</h2>
                        </td>
                        <td class="px-4 py-4">
                            <h2>{{ $food->fats }}</h2>
                        </td>
                        <td class="px-4 py-4">
                            <h2>{{ $food->carbonhydrates }}</h2>
                        </td>
                        <td class="px-4 py-4">
                            <button wire:click="addFoodItem({{ $food->id }})" wire:loading.attr="disabled">
                                @include('components.plus-button')
                            </button>
                        </td>
                    </tr>                
                @endforeach
            </tbody>
        </table>
        {{ $foods->links() }}
    </div>
    
    {{-- @if (session('status'))
        <div class="alert text-white alert-success">
            {{ session('status') }}
        </div>
    @endif --}}

    <div>
        <button x-data x-on:click="$dispatch('close-modal')" wire:click="saveFoodToUser" class="flex justify-center mx-auto mt-10 w-24 px-4 py-2 bg-action-color text-gray-200 font-semibold rounded hover:bg-action-hover hover:text-white">
            Done
        </button>
    </div>
</div>
