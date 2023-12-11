<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Forum;
use GrahamCampbell\ResultType\Success;
use App\Models\User;


class ForumUserController extends Controller
{
        // User dashboard
        public function userShow(Forum $forum)
        {

            if (auth()->user()->id == $forum->user_id)
            {

                return view('frontend.forums.userShow', [

                    'forum' => $forum,

                ]);

            } else {

                abort(404);

            }

        }


        public function UserPage()
        {

            $forum = Forum::latest()->where('user_id', auth()->user()->id)->paginate(20);

            if (request()->has('search'))

            {
                $forum = $forum->where('content', 'like', '%'. request()->get('search', '') . '%');
            }

            return view('frontend.forums.userForum', compact('forum'));

        }


        public function edit(Forum $forum)
        {
            if (auth()->id() !== $forum->user_id)
            {
                abort(404);
            }

            $editing = true;

            return view('frontend.forums.userEdit', [

                'forum' => $forum,
                'editing' => $editing,
            ]);
        }



        public function update(Forum $forum)
        {
            if (auth()->id() !== $forum->user_id)
            {
                abort(404);
            }

            $validated = request()->validate([
                'content' => 'required|min:12|max:600',
            ]);

            $forum->update($validated);


            return redirect()->route('forum.userShow', $forum->id)->with('message', 'செய்தி திருத்தப் பட்டுள்ளது');
        }



        public function previousPageAction()
        {
            // Your logic for navigating to the previous page

            // Set $editing to false to hide the edit form
            $editing = false;

            // Other code for the previous page
        }




        public function destroy(Forum $id)
        {
            // Forum::where('id', $id)->firstOrFail()->delete();
            // $forum->delete();
            if (auth()->id() !== $id->user_id)
            {
                abort(404);
            }
            $id->delete();
            return redirect()->route('forum.userPage')->with('message', 'செய்தி நீக்கப்பட்டுள்ளது');
        }


}
