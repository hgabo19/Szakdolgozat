<div>
    <x-custom-modal name="meal-tracker">
        <x-slot:body>
            @livewire('meal-tracker')
        </x-slot:body>
    </x-custom-modal>

    {{-- @livewire('food-list') --}}

    {{-- food list --}}
    <div class="m-4">
        <div
            class="container mx-auto mb-6 transition duration-300 ease-in-out border border-none rounded-lg shadow-lg bg-dark-charcoal content lg:w-full w-fit hover:shadow-xl hover:shadow-action-color shadow-action-hover">
            @livewire('logged-food-list')
        </div>
    </div>
</div>
