<?php

namespace App\Http\Controllers\Blogger;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class BlogController extends Controller
{

    public function HomePage()
    {
        $menuItems = Category::where('status', '0')->get();
        $latestPosts = Post::where('is_featured', true)->orderBy('created_at', 'DESC')->get()->take(2);
        $latest = Post::where('is_published', true)->orderBy('created_at', 'DESC')->get()->take(10);
        $category = Category::where('status', '0')->get();

        $randImage = ImageUpload::inRandomOrder()->limit(4)->get();

        return view('frontend.index', compact('menuItems', 'latestPosts', 'latest', 'category', 'randImage'));


    }



    public function viewCategoryPost(string $menuItem_slug)
    {
        $menuItems = Category::where('status', '0')->get();

        $category = Category::where('slug', $menuItem_slug)->where('status', '0')->first();

        if($category)
        {
            $posts = Post::where('category_id', $category->id)->where('is_published', true)->paginate(10);
            $latestPost = Post::where('is_published', true)->orderBy('created_at', 'DESC')->get()->take(10);
            // $postDescribtion = Str::limit($post->description, 29);
            return view('frontend.post.category-post', compact('posts', 'category', 'menuItems', 'latestPost'));
        }


    }


    // public function viewPost(string $category_slug, string $post_slug)
    // {
    //     $menuItems = Category::where('status', '0')->get();
    //     $category = Category::where('slug', $category_slug)->where('status', '0')->first();

    //     if($category)
    //     {
    //         $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('is_published', true)->first();
    //         // $postViews = Post::find('post_id')->increament('views');
    //         $latestPosts = Post::where('category_id', $category->id)->where('is_published', true)->orderBy('created_at', 'DESC')->get()->take(4);

    //         // $user = $post->user

    //     if ($post) {
    //         $post->increment('view_count');
    //     }


    //         return view('frontend.post.view-post', compact('post', 'menuItems', 'latestPosts'));
    //     }

    // }


    // public function viewPost(string $category_slug, string $post_slug)
    // {

    //     $menuItems = Category::where('status', '0')->get();
    //     $category = Category::where('slug', $category_slug)->where('status', '0')->first();

    //     if ($category) {

    //         $post = Post::where('category_id', $category->id)
    //             ->where('slug', $post_slug)
    //             ->where('is_published', true)
    //             ->first();

    //         $latestPosts = Post::where('category_id', $category->id)->where('is_published', true)->orderBy('created_at', 'DESC')->get()->take(4);

    //         if ($post) {
    //             $postKey = 'post_viewed_' . $post->id;
    //             $viewedAt = Session::get($postKey);

    //             // Check if the post has already been viewed within the last hour
    //             if (!$viewedAt || Carbon::now()->diffInMinutes($viewedAt) >= 1) {
    //                 // Increment the views_count and update the session
    //                 $post->increment('view_count');
    //                 Session::put($postKey, Carbon::now());
    //             }
    //         }

    //         return view('frontend.post.view-post', compact('post', 'menuItems', 'latestPosts'));
    //     }
    // }




    public function viewPost(string $category_slug, string $post_slug)
    {

        $menuItems = Category::where('status', '0')->get();
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        $latestPost = Post::where('is_published', true)->orderBy('created_at', 'DESC')->get()->take(10);

        if ($category) {

            $post = Post::with('postUser', 'category')
                    ->where('category_id', $category->id)
                    ->where('slug', $post_slug)
                    ->where('is_published', true)
                    ->first();

            $latestPosts = Post::where('category_id', $category->id)->where('is_published', true)->orderBy('created_at', 'DESC')->get()->take(4);

            if ($post) {
                $postKey = 'post_viewed_' . $post->id;
                $viewedAt = Session::get($postKey);

                // Check if the post has already been viewed within the last hour
                if (!$viewedAt || Carbon::now()->diffInMinutes($viewedAt) >= 1) {
                    // Increment the views_count and update the session
                    $post->increment('view_count');
                    Session::put($postKey, Carbon::now());
                }
            }

            return view('frontend.post.view-post', compact('post', 'menuItems', 'latestPosts'));
        }
    }

}
