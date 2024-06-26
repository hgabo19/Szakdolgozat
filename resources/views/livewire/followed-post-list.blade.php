<div>
    <div class="flex flex-col gap-5 mb-10 h-1/3">
        <div class="flex items-center justify-center gap-5 align-middle">
            <div class="relative w-1/2">
                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" wire:model.live.debounce.500ms ="search" id="simple-search" autocomplete="off"
                    class="block w-full p-3 text-base text-gray-900 border-2 rounded-xl border-action-color bg-action-color focus:ring-blue-500 focus:border-blue-500 ps-10 dark:bg-dark-charcoal dark:border-action-color dark:placeholder-gray-300 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-500"
                    placeholder="Search for users..." required>
            </div>
            @include('components.loading-indicator')
        </div>
        @foreach ($this->posts as $post)
            <div wire:key='post-{{ $post->id }}'>
                <livewire:post-card :key='$post->id' :$post />
            </div>
        @endforeach
    </div>
</div>
