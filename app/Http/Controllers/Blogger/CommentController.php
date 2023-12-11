<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store( Forum $forum, Request $request)
    {
        $request = request()->validate([
            'content' => 'required|min:12|max:600',
        ]);

        $comment = new Comment();

        $comment->content = $request['content'];
        $comment->user_id = Auth::user()->id;
        $comment->forum_id = $forum->id;

        $comment->save();


        return redirect()->route('forum.show', $forum->id)->with('success', 'செய்தி பதிய பட்டுள்ளது');
    }



}
