<x-app-layout>
    @include('components.health-tabs')
    
    <div class="pt-20 flex flex-row">
        <x-custom-modal>
            <x-slot:body>
                <livewire:calorie-calculation >
            </x-slot:body>
        </x-custom-modal>
        
        <div class="w-fit p-16 m-5">
            <div class="bg-secondary-color shadow-lg p-6 rounded-md flex justify-center relative w-fit h-fit">
                <livewire:health-summary>
            </div>
        </div>
    </div>
</x-app-layout>