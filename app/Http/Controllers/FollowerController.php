<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(User $user)
{
    $follower = Auth::user();
    $follower->followings()->attach($user);
    return redirect()->back();
}

public function unfollow(User $user)
{
    $follower = Auth::user();
    $follower->followings()->detach($user);
    return redirect()->back();
}

}
