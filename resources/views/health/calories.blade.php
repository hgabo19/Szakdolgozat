<div>
    <x-custom-modal name="meal-tracker">
        <x-slot:body>
            @livewire('meal-tracker')
        </x-slot:body>
    </x-custom-modal>

    {{-- @livewire('food-list') --}}

    {{-- food list --}}
    <div
        class="container mx-auto mb-6 transition duration-300 ease-in-out border border-none rounded-lg shadow-lg bg-secondary-color content lg:max-w-2/3 w-fit hover:shadow-xl hover:shadow-purple shadow-purple">
        @livewire('logged-food-list')
    </div>
</div>
