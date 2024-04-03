<button wire:click="toggleFollow()"
    class="{{ $suggestionFollow ? 'font-bold rounded-full text-base px-4 py-2.5' : 'font-medium rounded-lg px-14 py-2.5 mb-2' }}
    focus:outline-none text-white bg-action-color hover:bg-action-hover focus:ring-2 focus:ring-purple-300
    dark:bg-purple-600 dark:hover:bg-action-hover dark:focus:ring-white">
    <div class="flex items-center gap-2 align-middle">
        @if (!$this->user->isFollower(Auth::user()))
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
        @endif
        <p class="text-lg text-white">{{ $this->user->isFollower(Auth::user()) ? 'Unfollow' : 'Follow' }}</p>
    </div>
</button>
