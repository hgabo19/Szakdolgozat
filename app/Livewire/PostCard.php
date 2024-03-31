<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class PostCard extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.post-card');
    }

    #[Computed]
    public function creator()
    {
        return $this->post->user;
    }

    #[On('post-like-toggled')]
    public function refreshLikes()
    {
        $this->post = Post::withCount(['likes', 'comments'])
            ->with('categories')
            ->find($this->post->id);
    }

    #[On('user-follow-toggled')]
    public function refreshPost()
    {
        $this->post = Post::withCount(['likes', 'comments'])
            ->with('categories')
            ->find($this->post->id);
    }
}
