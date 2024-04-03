<div class="">
    <h1 class="text-3xl font-bold text-white">Trending</h1>
    <div class="flex flex-col gap-5 px-4 my-5">
        @foreach ($this->categories as $category)
            <div wire:key='category-{{ $category->id }}'>
                <a wire:navigate href="{{ route('blog.index', ['category' => $category->id]) }}">
                    <p class="text-lg font-bold text-white ">{{ $category->name }}</p>
                </a>
                <p class="px-2 text-base font-semibold text-gray-500">{{ $category->category_count }} posts</p>
                @if (!$loop->last)
                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-600">
                @endif
            </div>
        @endforeach
    </div>
</div>
