<div class="flex flex-col mb-10 gap-7 h-1/3">
    @foreach ($posts as $post)
        <x-custom-modal name="{{ $post->id }}">
            <x-slot:body>
                <livewire:comment-section :$post />
            </x-slot:body>
        </x-custom-modal>
        <livewire:post-card :$post />
    @endforeach
</div>
