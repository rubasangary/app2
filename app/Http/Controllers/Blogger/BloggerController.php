<?php

namespace App\Http\Controllers\Blogger;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostShare;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;



class BloggerController extends Controller
{

    public function writePost()
    {
        if (Auth::user()->role == '2') {
            $category = Category::where('status', '0')->get();
            return view('user.bloggers.create-post', compact('category'));
        } else {
            return view('bloggers.notAllowedmsg');
        }
    }



    public function storePost(Request $request){

        // Validate the incoming request data
        $data = $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'yt_iframe' => 'nullable|string',
        ]);

        $post = new Post;

        $post->user_id = Auth::user()->id;
        $post->category_id = $data['category_id'];
        $post->title = $data['title'];
        $post['slug'] = str_replace(' ', '-', $request->title);
        $post->content = $data['content'];
        $post->author = Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file)->fit(800, 400, function ($constraint) {
                $constraint->upsize();
            })->save('storage/blogPost/' . $filename);

            $post->image = $filename;
        }

        $url = 'https://example.com/bloggers/' . Str::slug($request->user()->name) . '/' . str_replace(' ', '-', $request->title);
        $post->url = $url;

        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['title'];
        $post->meta_keyword = $data['title'];

        $metaDescription = substr($data['content'], 0, 60);
        $post->meta_description = $metaDescription;


        $post->save();
        return redirect('/')->with('message', 'Post added successfully');

    }

    public function editPost(Request $request, $postId)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'yt_iframe' => 'nullable|string',
        ]);

        $post = Post::findOrFail($postId);

        $post->category_id = $data['category_id'];
        $post->title = $data['title'];
        $post['slug'] = str_replace(' ', '-', $request->title);
        $post->content = $data['content'];

        // Delete the existing image if a new image is uploaded or if the user chooses to remove the image
        if ($request->hasFile('image')) {
            // Delete the existing image if it exists
            if ($post->image) {
                $imagePath = public_path('storage/blogPost/') . $post->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file)->fit(600, 300, function ($constraint) {
                $constraint->upsize();
            })->save('storage/blogPost/' . $filename);

            $post->image = $filename;
        } elseif ($request->has('remove_image')) {
            // Delete the existing image if the user chooses to remove it
            if ($post->image) {
                $imagePath = public_path('storage/blogPost/') . $post->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $post->image = null;
        }

        $url = 'https://example.com/bloggers/' . Str::slug($request->user()->name) . '/' . str_replace(' ', '-', $request->title);
        $post->url = $url;

        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['title'];
        $post->meta_description = $data['title'];
        $post->meta_keyword = $data['title'];

        $post->save();

        return redirect('/')->with('message', 'Post updated successfully');
    }






    public function sharePost()
    {

        if (Auth::user()->role == '2')
        {
            return view('user.bloggers.share-post');
        }

        else{
            return view('bloggers.notAllowedmsg');
        }

    }

    public function viewPost()
    {

        if (Auth::user()->role == '2')
        {
            $posts = Post::paginate(5);
            return view('user.bloggers.view-posts', compact('posts'));
        }

        else{
            return view('bloggers.notAllowedmsg');
        }

    }







    public function storeSharedPost(Request $request){

        $data = $request->validate([
            'title' => 'required|string',
            'excerpts' => 'required|string',
            'web_link' => 'required|string',
        ]);

        $post = new PostShare;

        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $post['slug'] = str_replace(' ', '-', $request->title);
        $post->excerpts = $data['excerpts'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file)->fit(600, 300, function ($constraint) {
                $constraint->upsize();
            })->save('storage/postShare/' . $filename);

            $post->image = $filename;
        }

        $post->web_link = $data['web_link'];
        $post->shared_by = Auth::user()->id;

        $post->save();
        return redirect('/')->with('message', 'Post added successfully');

    }


}
