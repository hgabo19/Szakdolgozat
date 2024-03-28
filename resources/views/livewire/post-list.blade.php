<div class="flex flex-col mb-10 gap-7 h-1/3">
    @foreach ($posts as $post)
        <livewire:post-card :$post />
    @endforeach
</div>
