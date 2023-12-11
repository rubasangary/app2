<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class FrontPageController extends Controller
{

    // public function HomePage(string $category_slug, string $post_slug)
    // {
    //     $menuItems = Category::where('navbar_status', '0')->where('status', '0')->get();
    //     $latestPosts = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(1);

    //     return view('frontend.index', compact('menuItems', 'latestPosts', 'randImage'));

    // }


}
