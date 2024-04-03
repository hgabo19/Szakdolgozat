<x-app-layout>
    <div class="px-5 mx-auto rounded-xl w-fit lg:w-full ">
        <div>
            <div class="flex w-full gap-5 mt-12">
                {{-- left part --}}
                <div class="flex flex-col gap-8 mb-8 basis-1/5 animate-[fade-in_1.5s_ease-in-out]">
                    <x-blog-profile-card />
                    @livewire('blog-follow-suggestion')
                </div>

                {{-- center part --}}
                <div class="flex flex-col gap-5 basis-3/5">
                    {{-- add post section --}}
                    <div class="animate-fade_in_down_small">
                        @livewire('blog-post-form')
                    </div>
                    {{-- posts section --}}
                    <div class="animate-[fade-in_1.5s_ease-in-out]">
                        @livewire('post-list')
                    </div>
                </div>
                {{-- right part --}}
                <div
                    class="p-4 rounded-lg shadow-md h-fit basis-1/5 bg-darker-gray animate-[fade-in_1.5s_ease-in-out] shadow-action-hover">
                    @livewire('category-list')
                </div>
            </div>
        </div>
</x-app-layout>
