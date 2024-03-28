<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class PostCard extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.post-card');
    }

    #[On('post-like-toggled')]
    public function refreshLikes()
    {
        $this->post = Post::withCount(['likes', 'comments'])
            ->with('categories')
            ->find($this->post->id);
    }
}
