<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', 1)->paginate(3);

        return view('admin23.manage-posts.index', compact('posts'));
    }


    public function pendingPosts()
    {
        $posts = Post::where('is_published', 0)->paginate(3);

        return view('admin23.manage-posts.pending', compact('posts'));
    }


    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        if ($post) {
            $destination = 'storage/blogPosts/' . $post->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $post->delete();
            return redirect('admin23/posts')->with('message', 'Post deleted');

            } else

            {
                return redirect('admin23/posts')->with('message', 'No Post ID Found');
            }
    }



    public function postNow($id)
    {
        $publishStatus = Post::findOrFail($id);

        $publishStatus->is_published = true;
        $publishStatus->save();

        return back();

    }


    public function featurePost($id)
    {
        $post = Post::findOrFail($id);

        if ($post->is_featured == false) {
            $post->is_featured = true;
        } else {
            $post->is_featured = false;
        }

        $post->save();

        return back();
    }


}
