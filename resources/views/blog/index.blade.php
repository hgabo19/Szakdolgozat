<x-app-layout>
    <div class="px-5 mx-auto rounded-xl w-fit lg:w-full ">
        <div>
            <div class="flex w-full gap-5 mt-12">
                {{-- left part --}}
                <div class="flex flex-col gap-8 mb-8 basis-1/5 animate-fade_in_up">
                    <x-blog-profile-card />
                    <x-blog-to-follow-card />
                </div>

                {{-- center part --}}
                <div class="flex flex-col gap-5 basis-3/5">
                    {{-- add post section --}}
                    <div class="animate-fade_in_down_small">
                        @livewire('blog-post-form')
                    </div>
                    {{-- posts section --}}
                    <div class="animate-fade_in_up">
                        @livewire('post-list')
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
