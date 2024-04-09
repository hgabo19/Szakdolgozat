<x-app-layout>
    <div
        class="w-full p-4 mx-auto my-10 transition duration-300 ease-in-out shadow-md lg:p-10 rounded-xl bg-darker-gray lg:w-2/3 shadow-blue-400">
        <a href="{{ route('profile.show', Auth::user()) }}"
            class="px-2 text-lg font-extrabold text-white transition duration-300 ease-in-out border-b-2 border-blue-400 lg:text-2xl hover:border-action-hover">
            Profile
        </a>
        <h1 class="py-6 mb-6 text-xl font-bold text-center text-white lg:text-3xl">Who you interact with</h1>
        <div class="gap-10 lg:flex justify-evenly">
            <div class="flex flex-col items-center align-middle">
                <p class="mb-4 text-lg font-bold text-white lg:text-3xl">Followers</p>
                @foreach (Auth::user()->followers as $follower)
                    <div class="flex justify-between gap-5 px-5 my-2">
                        @if (!$follower->avatar)
                            <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute text-gray-400 w-14 h-14 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                        @else
                            <x-user-avatar :user="$follower" class="w-10 h-10 lg:w-14 lg:h-14" />
                        @endif
                        <div class="w-32 lg:w-56">
                            <p class="text-lg text-white truncate ">{{ $follower->name }}</p>
                            <a href="{{ route('profile.show', $follower) }}"
                                class="transition duration-300 ease-in-out hover:opacity-70">
                                <p class="text-base text-gray-400 truncate ">&commat;{{ $follower->username }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col items-center align-middle">
                <p class="mt-5 mb-4 text-lg font-bold text-white lg:mt-0 lg:text-3xl">Following</p>
                @foreach (Auth::user()->following as $followed)
                    <div class="flex justify-between gap-2 px-5 my-2 lg:gap-5 lg:px-10">
                        <div class="flex justify-center w-10 lg:w-14">
                            @if (!$followed->avatar)
                                <div
                                    class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full lg:w-14 lg:h-14 dark:bg-gray-600">
                                    <svg class="absolute w-12 h-12 text-gray-400 lg:w-16 lg:h-16 -left-1"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </div>
                            @else
                                <x-user-avatar :user="$followed" class="w-10 h-10 lg:w-14 lg:h-14" />
                            @endif
                        </div>
                        <div class="w-[7.5rem] lg:mr-2">
                            <p class="text-lg text-white truncate">{{ $followed->name }}</p>
                            <a href="{{ route('profile.show', $followed) }}"
                                class="transition duration-300 ease-in-out hover:opacity-70">
                                <p class="text-base text-gray-400 truncate">&commat;{{ $followed->username }}</p>
                            </a>
                        </div>
                        <div class="flex items-center justify-center flex-grow align-middle basis-1/6 w-fit lg:w-20 ">
                            <livewire:follow-button :key="$followed->id" :user="$followed" :suggestionFollow="true" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
