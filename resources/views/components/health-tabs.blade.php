<div>
    <nav class="flex justify-center items-center flex-row gap-32">
        <div class="border-b-2 border-solid border-b-purple">
            <x-nav-link wire:navigate.hover href="{{ route('health.index') }}" :active="request()->routeIs('health.index')">
                Health data
            </x-nav-link>
            <x-nav-link wire:navigate.hover href="{{ route('health.calories') }}" :active="request()->routeIs('health.calories')">
                Calories
            </x-nav-link>
            <x-nav-link wire:navigate.hover href="{{ route('health.challenges') }}" :active="request()->routeIs('health.challenges')">
                Challenges            
            </x-nav-link>
        </div>
    </nav>
</div>