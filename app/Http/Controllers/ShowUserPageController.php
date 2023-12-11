<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ShowUserPageController extends Controller
{

    public function show(User $user)
    {
        $forum = $user->forum()->paginate(20);

        return view('frontend.forums.userPageDisplay', compact('user', 'forum'));
    }


}
