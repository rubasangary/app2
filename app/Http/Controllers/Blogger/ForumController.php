<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Forum;



class ForumController extends Controller
{

    public function show(Forum $forum)
    {
        $user = Auth::user();

        // Check if the user is following this forum poster
        $isFollowing = $user ? $user->followings->contains($forum->user) : false;



        return view('frontend.forums.show', [
            'forum' => $forum,
            'user' => $user,
            'isFollowing' => $isFollowing,
        ]);
    }


    public function index()
    {

        $forum = Forum::orderBy('created_at', 'DESC');

        if (request()->has('search'))
        {
            $forum = $forum->where('content', 'like', '%'. request()->get('search', '') . '%');
        }

        return view('frontend.forums.index-forum', [
            'forum' => $forum->paginate(3)
        ]);

    }



    public function store(Request $request)
    {
        $request = request()->validate([
            'content' => 'required|min:12|max:600',
        ]);

        $forum = new Forum;

        $forum->content = $request['content'];
        $forum->user_id = Auth::user()->id;

        $forum->save();


        return redirect()->route('forum.userPage')->with('success', 'செய்தி பதிய பட்டுள்ளது');
    }



}
