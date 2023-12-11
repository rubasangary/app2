<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class UserHomePageController extends Controller
{

    public function showblogs(User $user)
    {
        $blogs = $user->blogs()->paginate(20);
        $hasBlogs = $blogs->count() > 0;

        return view('frontend.post.blogsUserHome', compact('user', 'blogs', 'hasBlogs'));
    }


    public function showforum(User $user)
    {
        $forum = $user->forum()->paginate(20);

        return view('frontend.forums.forumUserHome', compact('user', 'forum'));
    }


    public function showImage(User $user)
    {
        $randImage = $user->imageUpload()->paginate(20);

        return view('frontend.uploads.imageUserHome', compact('randImage', 'user'));
    }


    // Show user (product) ads page
    public function showProduct(User $user)
    {
        $advertisements = $user->advertisement()->where('published', 1)->paginate(20);

        return view('frontend.seller.adsUserHome', compact('advertisements', 'user'));
    }


    // Show user jobs
    public function userJobs(User $user)
    {
        $jobs = $user->jobads()->paginate(20);

        return view('frontend.jobs.jobsUserHome', compact('jobs', 'user'));
    }


}
