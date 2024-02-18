<div>
    <x-custom-modal name="meal-tracker">
        <x-slot:body>
            @livewire('meal-tracker')         
        </x-slot:body>
    </x-custom-modal>

    {{-- @livewire('food-list') --}}

    {{-- food list --}}
    <div class="bg-secondary-color border-none container content md:w-2/3 w-fit h-fit max-h-5/6 my-6 mx-auto border rounded-lg shadow-lg hover:shadow-xl">
        @livewire('logged-food-list')
    </div>
</div>