<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{


    public $posts;

    public function mount()
    {
        $this->posts = Post::withCount(['likes', 'comments'])
            ->with('categories')
            ->latest()
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
