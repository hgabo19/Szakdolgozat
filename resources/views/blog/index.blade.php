<x-app-layout>
    <div class="px-5 mx-auto rounded-xl w-fit lg:w-full ">
        <div>
            <div class="flex w-full gap-5 mt-12">
                {{-- left part --}}
                <div class="flex flex-col gap-8 mb-8 basis-1/5">
                    <x-blog-profile-card />
                    <x-blog-to-follow-card />
                </div>

                {{-- center part --}}
                <div class="flex flex-col gap-5 basis-3/5">
                    {{-- add post section --}}
                    @livewire('blog-post-form')
                    {{-- posts section --}}
                    <div class="flex flex-col gap-7 h-1/3">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="flex gap-5 px-5 py-3 bg-darker-gray rounded-xl">
                                <div class=" basis-1/7">
                                    <div
                                        class="relative overflow-hidden bg-gray-100 rounded-full w-14 h-14 dark:bg-gray-600">
                                        <svg class="absolute w-16 h-16 text-gray-400 -left-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center justify-start gap-5 align-middle">
                                        <p class="text-xl text-white">Elon Musk</p>
                                        <p class="pt-1 text-sm text-gray-400">&commat;ElMusk19</p>
                                    </div>
                                    <div>
                                        <p class="text-base text-gray-400">2 hours ago</p>
                                    </div>
                                    <div class="w-11/12 py-4">
                                        <p class="text-base text-white"> Lorem ipsum, dolor sit amet consectetur
                                            adipisicing
                                            elit.
                                            Dignissimos odio, quam
                                            voluptatem sequi, aperiam maiores quaerat soluta nobis vero nesciunt, eius
                                            similique
                                            veritatis iure laborum quibusdam consequuntur ex voluptates quia?</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex items-center gap-2 align-middle">
                                            {{-- heart icon --}}
                                            <div class="p-1 bg-pink-600 rounded-full w-fit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="white"
                                                    class="w-6 h-6 pt-0.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">214k</p>
                                        </div>
                                        <div class="flex items-center align-middle">
                                            <p class="mr-5 text-sm text-gray-500">41 Comments
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-5 mr-5">
                                        <button
                                            class="focus:outline-none text-white bg-action-color hover:bg-action-hover focus:ring-2 focus:ring-purple-300 font-medium rounded-lg text-sm px-16 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-action-hover dark:focus:ring-white">
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-7 h-7">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                </svg>
                                                <p class="text-base text-white">Like</p>
                                            </div>
                                        </button>
                                        <button
                                            class="focus:outline-none text-white bg-action-color hover:bg-action-hover focus:ring-2 focus:ring-purple-300 font-medium rounded-lg text-sm px-14 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-action-hover dark:focus:ring-white">
                                            <div class="flex items-center gap-2 align-middle">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="grey"
                                                    class="w-7 h-7">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                                                </svg>
                                                <p class="text-base text-white">Comment</p>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
