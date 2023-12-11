<?php

namespace App\Http\Controllers\Admin;


use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Http\Requests\Admin\PostEditFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin23.post.index', compact('posts'));
    }

    public function create(){
        $category = Category::get();
        return view('admin23.post.create', compact('category'));
    }

    public function store(Request $request){

        $data = $request->validated();

        $post = new Post;

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post['slug'] = str_replace(' ', '-', $request->name);
        $post->description = $data['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(null, 400)->save('storage/blogPost/'. $filename);
            $post->image = $filename;
        }

        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        $post->save();
        return redirect('admin23/posts')->with('message', 'Post added successfully');

    }

    public function edit($post_id){

        $category = Category::get();
        $post = Post::find($post_id);

        return view('admin23.post.edit', compact('post', 'category'));
    }

    public function update(PostEditFormRequest $request, $post_id){

        $data = $request->validated();

        $post = Post::find($post_id);

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post['slug'] = str_replace(' ', '-', $request->name);
        $post->description = $data['description'];

        if($request->hasFile('image')){

            $destination = 'storage/blogPost/'. $post->image;

            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $filename = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(null, 400)->save('storage/blogPost/'. $filename);
            $post->image = $filename;
        }

        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        $post->update();
        return redirect('admin23/posts')->with('message', 'Post updated successfully');

    }

    public function destroy($post_id){

        $post = Post::find($post_id);


        if ($post) {

            $destination = 'storage/blogPosts/'. $post->image;

                if(File::exists($destination)){
                    File::delete($destination);
                }

            $post->delete();
            return redirect('admin23/posts')->with('message', 'Post deleted');

           }
           else {
            return redirect('admin23/posts')->with('message', 'No Post ID Found ');
           }
    }


}
