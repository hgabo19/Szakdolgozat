<div>
    <div class="mx-auto max-w-fit">
        <div class="max-w-full md:w-[55rem] w-full">
            <div class="mx-auto">
                <div class="p-6 rounded-md bg-dark-gray">
                    <div class="flex">
                        <h1 class="mx-auto mt-3 mb-5 text-4xl font-semibold text-white">Comment section</h1>
                        <div class="justify-end mt-3">
                            <div
                                class="p-1 transition duration-300 ease-in-out rounded-full bg-action-color hover:bg-action-hover">
                                <button x-data x-on:click="$dispatch('close-modal')" class="align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="white" class="w-9 h-9">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <form wire:submit.prevent="addComment" method="POST">
                            @csrf
                            <div class="flex gap-5">
                                <textarea wire:model="comment" id="comment" rows="2" cols="4"
                                    class="block p-2.5 w-3/4 resize-none text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-blue-500"
                                    placeholder="Say something nice :)...">
                                    </textarea>
                                <div class="flex items-center align-middle">
                                    <button type="submit"
                                        class="text-white bg-action-color hover:bg-action-hover focus:outline-none focus:ring-2 focus:ring-white font-extrabold rounded-full text-lg px-4 py-2.5 text-center dark:bg-action-color dark:hover:bg-action-hover dark:focus:ring-white">
                                        Comment
                                    </button>
                                </div>
                            </div>
                            @error('comment')
                                <span class="block ml-3 text-sm text-left text-red-500 md:text-base">
                                    {{ $message }} </span>
                            @enderror
                        </form>
                    </div>
                    <h2 class="mx-auto mt-3 mb-5 text-3xl font-semibold text-white">Comments</h2>
                    <hr class="w-full h-1 mt-8 mb-6 border-0 bg-violet-700">
                    <div class="w-full p-5 overflow-y-auto rounded-lg bg-darker-gray max-h-[20rem]">

                        @forelse ($this->comments as $comment)
                            <div class="my-6">
                                <div class="flex gap-3">
                                    <div
                                        class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                        <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex items-center align-middle">
                                        <p class="text-base font-bold text-white md:text-lg">
                                            {{ $comment->user->name ? $comment->user->name : $comment->user->username }}
                                        </p>
                                    </div>
                                    <div class="flex items-center align-middle">
                                        <p class="text-sm font-semibold text-gray-500 md:text-base">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <div class="w-full pl-10 pr-6 mt-2 md:px-10">
                                    <p class="text-sm text-white break-words md:text-base">{{ $comment->body }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="my-3 text-lg text-white">No comments yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
