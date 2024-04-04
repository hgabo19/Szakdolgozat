<div class="p-4 shadow-lg bg-darker-gray shadow-action-color rounded-xl">
    <div class="flex flex-col">
        <h1 class="pb-4 text-xl font-bold text-center text-white">Who you can follow</h1>
        @foreach ($this->suggestions as $user)
            <div wire:key='{{ $user->id }}' class="flex justify-center gap-5 my-2">
                @if (!$user->avatar)
                    <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute text-gray-400 w-14 h-14 -left-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </div>
                @else
                    <x-user-avatar :user="$user" class="w-14 h-14" />
                @endif
                <div class="w-[7.5rem]">
                    <p class="text-lg text-white truncate">{{ $user->name }}</p>
                    <a href="{{ route('profile.show', $user) }}"
                        class="transition duration-300 ease-in-out hover:opacity-70">
                        <p class="text-base text-gray-400 truncate">&commat;{{ $user->username }}</p>
                    </a>
                </div>
                <div class="flex items-center justify-center align-middle">
                    <livewire:follow-button :user="$user" :suggestionFollow="$suggestionFollow" />
                </div>
            </div>
        @endforeach
    </div>
</div>