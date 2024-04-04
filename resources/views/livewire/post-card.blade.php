<div>
    <div class="relative flex gap-5 px-5 py-3 bg-darker-gray rounded-xl">
        <div class=" basis-1/7">
            @if (!$this->creator->avatar)
                <div class="relative overflow-hidden bg-gray-100 rounded-full w-14 h-14 dark:bg-gray-600">
                    <svg class="absolute w-16 h-16 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                </div>
            @else
                <x-user-avatar :user="$this->creator" class="w-[4.5rem] h-[4rem]" />
            @endif
        </div>
        <div class="flex flex-col w-full">
            <div class="flex items-center justify-start gap-3 align-middle">
                <p class="mb-1 text-xl text-white">{{ $this->creator->name }}</p>
                <a href="{{ route('profile.show', $this->creator) }}"
                    class="transition duration-300 ease-in-out border-b border-transparent hover:opacity-75 hover:border-b hover:border-sky-400">
                    <p class="text-base text-gray-400 ">&commat;{{ $this->creator->username }}</p>
                </a>
                @if ($this->creator->isFollower(Auth::user()))
                    <div class="flex items-center align-middle gap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="green" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-sm text-green-600">Following</p>
                    </div>
                @endif
            </div>
            <div>
                <p class="text-base text-gray-400">
                    {{ $post->created_at->timezone('Europe/Budapest')->diffForHumans() }}
                </p>
            </div>
            @if ($post->image_path)
                <div class="w-11/12 py-4">
                    <p class="text-base font-medium text-white">
                        {{ $post->body }}
                    </p>
                </div>
                <div class="mt-3 mb-5 max-h-[29rem]">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="image"
                        class="mb-4 mr-10 rounded-lg max-h-40 lg:max-h-56 2xl:max-h-full">
                </div>
            @else
                <div class="w-11/12 py-4">
                    <p class="text-lg font-medium text-white">
                        {{ $post->body }}
                    </p>
                </div>
                <div class="absolute text-gray-400 top-5 right-10">
                    <p class="text-lg">Thread</p>
                </div>
            @endif
            @if ($post->categories->count() > 0)
                <div class="flex gap-3 mb-5">
                    @foreach ($post->categories as $category)
                        <div wire:key='categ-{{ $category->id }}'>
                            <p class="text-lg font-bold text-gray-300">{{ $category->name }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="flex justify-between">
                <div class="flex items-center gap-2 align-middle">
                    {{-- heart icon --}}
                    <div class="p-1 bg-pink-600 rounded-full w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="white" class="w-6 h-6 pt-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </div>
                    <p class="text-gray-400 text-md">{{ $post->likes->count() }}</p>
                </div>
                <div class="flex items-center align-middle">
                    <p class="mr-5 text-gray-400 text-md">{{ $post->comments->count() }} Comments
                    </p>
                </div>
            </div>
            {{-- comment modal --}}
            <x-custom-modal name="comment-{{ $post->id }}">
                <x-slot:body>
                    <livewire:comment-section :$post />
                </x-slot:body>
            </x-custom-modal>
            <div class="flex justify-between gap-4 mt-5 mr-5">
                <livewire:like-button :$post />
                @if (Auth::user()->id != $this->creator->id)
                    <livewire:follow-button :user="$this->creator" />
                @endif
                <button x-data x-on:click="$dispatch('open-modal', { name : 'comment-{{ $post->id }}'})"
                    class="focus:outline-none text-white bg-action-color hover:bg-action-hover focus:ring-2 focus:ring-purple-300 font-medium rounded-lg px-12 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-action-hover dark:focus:ring-white">
                    <div class="flex items-center gap-2 align-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="grey" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                        </svg>
                        <p class="text-lg text-white">Comment</p>
                    </div>
                </button>
            </div>
            @can('edit', $post)
                {{-- modal --}}
                <x-custom-modal name="edit-{{ $post->id }}">
                    <x-slot:body>
                        <livewire:blog-post-edit-form :$post />
                    </x-slot:body>
                </x-custom-modal>
                <div class="absolute flex top-5 right-28">
                    <button x-data x-on:click="$dispatch('open-modal', { name : 'edit-{{ $post->id }}'})"
                        class="px-4 py-2 text-base font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                    <form action='{{ route('blog.destroy', $post->id) }}' method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="px-3 py-2 text-base font-medium text-white bg-red-700 rounded-lg focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300 me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </div>
            @endcan
        </div>
    </div>
</div>
