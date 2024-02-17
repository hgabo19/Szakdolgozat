<div>
    <div class="flex relative">
        <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Food list for the day</h1>
        <div class="absolute end-0 top-6 right-8">
            <button x-data x-on:click="$dispatch('open-modal', { name : 'meal-tracker'})">
                @include('components.plus-button')
            </button>
        </div>
    </div>
    <hr class="w-full h-1 mt-4 mb-8 bg-purple border-0">
    <div class="h-48 overflow-y-scroll">
        @if (count($loggedMealsToday) == 0)
            <div class="font-medium text-lg text-white px-5 my-3 ml-5">
                Come on, add some food!
            </div>
        @else
            @foreach ($loggedMealsToday as $meal)
                <div wire:key="{{ $meal->id }}">
                    <div class="font-medium text-lg text-white px-5 my-3 ml-5">
                        {{ $meal->name }}
                    </div>
                    @if (!$loop->last)
                        <hr class="h-1 my-5 bg-purple border-0 w-30 mx-6">
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <hr class="w-3/4 h-0.5 mt-8 bg-purple border-0 ml-28 ">
    <div class="flex justify-end">
        <h2 class="font-extrabold text-xl text-white mx-6 py-4">Total calories: 0</h2>
    </div>
    <div class="flex">
        <h1 class="font-semibold text-2xl text-white my-5 mx-auto">Previously tracked days</h1>
    </div>
</div>
