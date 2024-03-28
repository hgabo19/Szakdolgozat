<button wire:click="toggleLike()"
    class="focus:outline-none text-white bg-action-color hover:bg-action-hover focus:ring-1 focus:ring-purple-300 font-medium rounded-lg text-sm px-16 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-action-hover dark:focus:ring-white">
    <div class="flex items-center gap-2 align-middle">
        <svg xmlns="http://www.w3.org/2000/svg" fill="{{ Auth::user()?->hasLiked($post) ? 'rgb(236 72 153)' : 'white' }}"
            viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
        </svg>
        <p class="text-lg font-bold text-white">{{ Auth::user()?->hasLiked($post) ? 'Liked' : 'Like' }}</p>
    </div>
</button>
