<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportAttributes\AttributeCollection;

class FollowButton extends Component
{

    public $user;
    public $suggestionFollow = false;

    public function render()
    {
        return view('livewire.follow-button');
    }

    public function toggleFollow()
    {
        if (Auth::user()) {
            if (!$this->user->isFollower(Auth::user())) {
                $this->user->followers()->attach(Auth::user()->id);
                $this->dispatch('user-follow-toggled');
                $this->dispatch(
                    'toast',
                    type: 'success',
                    title: "Started following!",
                    position: 'bottom-end',
                    timer: 2500,
                    background: '#03c04a',
                    color: '#fff',
                    iconColor: '#fff'
                );
                return;
            }

            $this->user->followers()->detach(Auth::user()->id);
            $this->dispatch('user-follow-toggled');
            $this->dispatch(
                'toast',
                type: 'error',
                title: "Following stopped!",
                position: 'bottom-end',
                timer: 2500,
                background: '#DC143C',
                color: '#fff',
                iconColor: '#fff'
            );
        }
    }
}
