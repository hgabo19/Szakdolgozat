<x-app-layout>
    <div class="w-full px-5 mx-auto rounded-xl">
        <div>
            <div class="w-full gap-5 mt-12 lg:flex">
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
                    <div x-data="{ activeTab: 'all' }" class="animate-[fade-in_1.5s_ease-in-out]">
                        <ul class="flex justify-center mb-4">
                            <li class="px-4 py-1 mr-4 text-xl font-medium text-white cursor-pointer"
                                x-on:click="activeTab = 'all'"
                                :class="{ 'border-b-2 border-action-hover': activeTab === 'all' }">
                                All Posts
                            </li>
                            <li class="px-4 py-1 text-xl font-medium text-white cursor-pointer"
                                x-on:click="activeTab = 'following'"
                                :class="{ 'border-b-2 border-action-hover': activeTab === 'following' }">
                                Following
                            </li>
                        </ul>
                        {{-- posts section --}}
                        <div x-show="activeTab === 'all'">
                            @livewire('post-list')
                        </div>
                        <div x-show="activeTab === 'following'">
                            @livewire('followed-post-list')
                        </div>
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
