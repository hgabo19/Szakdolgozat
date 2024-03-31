<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.like-button');
    }

    public function toggleLike()
    {
        if (Auth::user()) {
            $user = Auth::user();

            if ($user->hasLiked($this->post)) {
                $user->likes()->detach($this->post->id);
                $this->dispatch('post-like-toggled');
                $this->dispatch(
                    'toast',
                    type: 'error',
                    title: "Post unliked!",
                    position: 'bottom-end',
                    timer: 2500,
                    background: '#DC143C',
                    color: '#fff',
                    iconColor: '#fff'
                );
                return;
            }
            $user->likes()->attach($this->post->id);
            $this->dispatch('post-like-toggled');
            $this->dispatch(
                'toast',
                type: 'success',
                title: "Post liked!",
                position: 'bottom-end',
                timer: 2500,
                background: '#03c04a',
                color: '#fff',
                iconColor: '#fff'
            );
        } else {
            return redirect()->route('login');
        }
    }
}
