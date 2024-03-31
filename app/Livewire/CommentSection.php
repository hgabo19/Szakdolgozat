<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommentSection extends Component
{
    public $post;

    #[Validate('required|min:3|max:200')]
    public $comment;

    #[Computed]
    public function comments()
    {
        return $this?->post?->comments()->latest()->get();
    }

    public function render()
    {
        return view('livewire.comment-section');
    }

    public function addComment()
    {
        if (Auth::user()) {
            $validated = $this->validateOnly('comment');

            $newComment = new Comment();
            $newComment->user_id = Auth::user()->id;
            $newComment->body = $validated['comment'];

            $this->post->comments()->save($newComment);
            $this->reset('comment');
            $this->dispatch(
                'toast',
                type: 'success',
                title: "Comment added!",
                position: 'bottom-end',
                timer: 2500,
                background: '#03c04a',
                color: '#fff',
                iconColor: '#fff'
            );
        }
    }
}
