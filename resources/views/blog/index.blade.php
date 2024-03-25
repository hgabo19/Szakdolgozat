<x-app-layout>
    <div class="px-5 mx-auto rounded-xl w-fit lg:w-full ">
        <div>
            <div class="flex w-full gap-5 mt-12">
                {{-- left part --}}
                @include('components.blog-left-side')
                {{-- center part --}}
                <div class="flex flex-col gap-5 basis-3/5">
                    {{-- add post section --}}
                    @livewire('blog-post-form')
                    {{-- posts section --}}
                    <div class="flex flex-col gap-5 overflow-y-auto h-1/3 ">
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
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
