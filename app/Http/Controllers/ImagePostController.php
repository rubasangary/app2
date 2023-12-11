<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageCategory;
use App\Models\ImageUpload;
use App\http\Requests\ImageUploadsRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;


class ImagePostController extends Controller
{
    public function index()
    {
        $randImage = ImageUpload::inRandomOrder()->limit(4)->get();
        return view('frontend.uploads.index', compact('randImage'));
    }


    public function postImage()
    {
        $category = ImageCategory::all();
        return view('user.shareImages.postImage', compact('category'));
    }


    public function storeImage(ImageUploadsRequest $request)
    {
        $data = $request->validated();

        $post = new ImageUpload;

        $post->image_category_id = $data['image_category_id'];
        $post->name = $data['name'];
        $post['slug'] = str_replace(' ', '-', $request->name);
        $post->description = $data['description'];

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $desiredHeight = 400; // Desired height in pixels
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file);

            // Calculate the new width while maintaining aspect ratio
            $widthRatio = $image->width() / $desiredHeight;
            $newWidth = $image->width() / $widthRatio;

            // Resize the image to the desired dimensions
            $image->resize($newWidth, $desiredHeight, function ($constraint) {
                $constraint->aspectRatio(); // Maintain aspect ratio
            });

            // Save the image
            $image->save('storage/pictures/' . $filename);

            $post->image = $filename;
        }




        $post->created_by = Auth::user()->id;

        $post->save();

        return back()->with('message', 'Post added successfully');
    }


}
