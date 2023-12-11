<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ForumLike;

class LikeButton extends Component
{
    public $forum;

    public function mount($forum)
    {
        $this->forum = $forum;
    }

    public function like()
    {
        // Implement the logic to like the forum
        // Update the necessary data and relationships

        $this->forum->forumLikes()->attach(auth()->id());
    }

    public function unlike()
    {
        // Implement the logic to unlike the forum
        // Remove the like record from the database

        $this->forum->forumLikes()->detach(auth()->id());
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
