<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class FollowedPostList extends Component
{

    public $search = '';

    #[Computed()]
    public function posts()
    {
        $user = Auth::user();
        return Post::withCount(['likes', 'comments'])
            ->with('categories')
            ->with('user')
            ->whereHas('user', function ($query) use ($user) {
                $query->whereIn('id', $user->following->pluck('id'));
            })
            ->when($this->search, function ($query) {
                $query->filterByUser($this->search);
            })
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.followed-post-list');
    }
}
