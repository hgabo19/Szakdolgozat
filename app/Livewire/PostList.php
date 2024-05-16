<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class PostList extends Component
{
    #[Url()]
    public $category = '';

    public $search = '';

    #[Computed()]
    public function posts()
    {
        return Post::withCount(['likes', 'comments'])
            ->with('categories')
            ->when($this->category, function ($query) {
                $query->filterByCategory($this->category);
            })
            ->when($this->search, function ($query) {
                $query->filterByUser($this->search);
            })
            ->latest()
            ->get();
    }

    #[Computed()]
    public function categoryFilter()
    {
        return Category::where('id', $this->category)->first();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
