<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostLikes extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function like()
    {
        if (!Auth::check()) {
            return redirect()->guest(route('login'));
        }

        $this->post->postLikes()->attach(auth()->id());
    }

    public function unlike()
    {
        if (!Auth::check()) {
            return redirect()->guest(route('login'));
        }

        $this->post->postLikes()->detach(auth()->id());
    }


    public function render()
    {
        return view('livewire.post-likes');
    }
}
