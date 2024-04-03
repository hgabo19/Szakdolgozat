<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportAttributes\AttributeCollection;

class BlogFollowSuggestion extends Component
{
    #[Computed()]
    public function suggestions()
    {
        $userId = Auth::id();
        return User::where('id', '!=', $userId)
            ->whereDoesntHave('followers', function ($query) use ($userId) {
                $query->where('follower_id', $userId);
            })
            ->withCount('followers')
            ->orderBy('followers_count', 'desc')
            ->limit(5)
            ->get();
    }

    public $suggestionFollow = true;

    public function render()
    {
        return view('livewire.blog-follow-suggestion');
    }
}
