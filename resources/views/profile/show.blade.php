<x-app-layout>
    <div
        class="w-full p-4 mx-auto my-10 transition duration-300 ease-in-out shadow-md lg:p-14 rounded-xl bg-darker-gray lg:w-2/3 shadow-blue-400">
        <div class="relative lg:flex lg:gap-32">
            {{-- temp img --}}
            @if (!$user->avatar)
                <div class="animate-[fade-in_2s_ease-in-out]">
                    <div
                        class="relative lg:w-[7.5rem] w-20 h-20 lg:h-[7.5rem] overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute w-[5.5rem] h-[5.5rem] lg:w-32 lg:h-32 mt-2 text-gray-400 -left-1"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </div>
                </div>
            @else
                <div class="animate-[fade-in_2s_ease-in-out]">
                    <x-user-avatar :user="$user" class="w-20 h-20 lg:w-32 lg:h-32" />
                </div>
            @endif
            <div class="flex items-center justify-center my-4 align-middle lg:my-0">
                <div class="flex items-center justify-center gap-10 align-middle lg:gap-32">
                    <div class="text-xl lg:text-5xl text-white animate-[fade-in-down-small_1s_ease-in-out]">
                        <p class="font-extrabold text-center">{{ $user->posts->count() }}</p>
                        <p class="text-xl text-gray-500">posts</p>
                    </div>
                    @if (Auth::user()->id == $user->id)
                        <div class="text-xl lg:text-5xl text-white animate-[fade-in-down-small_1.5s_ease-in-out]">
                            <p class="font-extrabold text-center">{{ $user->followers->count() }}</p>
                            <a href="{{ route('profile.followers') }}">
                                <p
                                    class="text-xl text-gray-500 transition duration-300 ease-in-out hover:text-gray-200">
                                    followers</p>
                            </a>
                        </div>
                        <div class="text-xl lg:text-5xl text-white animate-[fade-in-down-small_2s_ease-in-out]">
                            <p class="font-extrabold text-center">{{ $user->following->count() }}</p>
                            <a href="{{ route('profile.followers') }}">
                                <p
                                    class="text-xl text-gray-500 transition duration-300 ease-in-out hover:text-gray-200">
                                    following</p>
                            </a>
                        </div>
                    @else
                        <div class="lg:text-5xl text-xl text-white animate-[fade-in-down-small_1.5s_ease-in-out]">
                            <p class="font-extrabold text-center">{{ $user->followers->count() }}</p>
                            <p class="text-xl text-gray-500">followers</p>
                        </div>
                        <div class="lg:text-5xl text-xl text-white animate-[fade-in-down-small_2s_ease-in-out]">
                            <p class="font-extrabold text-center">{{ $user->following->count() }}</p>
                            <p class="text-xl text-gray-500">following</p>
                        </div>
                    @endif
                </div>
                <div
                    class="absolute top-0 right-0 p-3 transition duration-300 ease-in-out rounded-full lg:mt-5 lg:right-5 bg-action-hover hover:bg-action-color">
                    <a class="text-2xl text-white" href="{{ route('profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7 lg:w-10 lg:h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-2/6 mt-5 animate-[fade-in_2s_ease-in-out]">
            <p class="text-xl font-bold text-white lg:text-2xl">{{ $user->name }}</p>
            <p class="ml-2 text-base font-bold text-gray-500 lg:text-xl">&commat;{{ $user->username }}</p>
        </div>
        <p class="text-base text-right text-gray-400 lg:text-xl">Bio</p>
        <div class="flex items-end justify-end">
            <p class="w-2/6 mt-2 ml-2 text-sm lg:text-xl text-right text-white animate-[fade-in_2s_ease-in-out]">
                {{ $user->bio }}
            </p>
        </div>
        <hr class="h-1 border-0 rounded-lg bg-sky-400 my-11 dark:bg-sky-400">
        <h2 class="mt-4 mb-6 text-2xl font-bold text-center text-white lg:text-4xl">Posts</h2>
        @if (count($user->posts) > 0)
            <div class="grid grid-cols-3 gap-3">
                @foreach ($user->posts as $post)
                    <div wire:key='{{ $post->id }}'
                        class="overflow-hidden border border-gray-300 aspect-square animate-fade_in_up">
                        <a href="{{ route('blog.show', $post) }}">
                            @if ($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt=""
                                    class="object-cover w-full h-full transition duration-300 ease-in-out hover:opacity-50">
                            @else
                                <div
                                    class="w-full h-full transition duration-300 ease-in-out bg-dark-charcoal hover:opacity-50">
                                    <p
                                        class="pt-2 text-xl font-extrabold text-center text-gray-300 lg:pt-8 lg:text-3xl">
                                        Thread
                                    </p>
                                    <div class="w-4/5 mx-auto mt-2 lg:mt-8">
                                        <p
                                            class="text-sm font-bold leading-loose tracking-wide text-white lg:text-lg line-clamp-2">
                                            {{ $post->body }}</p>
                                    </div>
                                </div>
                            @endif

                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-10 text-2xl font-bold text-center text-gray-200">No posts yet..</p>
        @endif

    </div>
</x-app-layout>
