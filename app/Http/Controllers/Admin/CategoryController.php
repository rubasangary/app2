<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin23.category.index', compact('category'));
    }

    public function create(){
        return view('admin23.category.create');
    }

    public function store(CategoryFormRequest $request){

        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(300,200)->save('storage/category/'. $filename);
            $category->image = $filename;
        }


        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];


        //If it is true store as '1' elase store as '0'
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin23/category')->with('message', 'Category added successfully');

    }



    public function edit($category_id){

        $category = Category::find($category_id);
        return view('admin23.category.edit', compact('category'));
    }



    public function update(CategoryFormRequest $request, $category_id){

        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];


        if($request->hasFile('image')){

            $destinationCat = 'storage/category/'. $category->image;

            if(File::exists($destinationCat)){
                File::delete($destinationCat);
            }


            $file = $request->file('image');
            $filename = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(300,200)->save('storage/category/'. $filename);
            $category->image = $filename;
        }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];


        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin23/category')->with('message', 'Category updated successfully');
    }


    public function destory($category_id){

        $category = Category::find($category_id);

       if ($category) {

        $destinationCat = 'storage/category/'. $category->image;

            if(File::exists($destinationCat)){
                File::delete($destinationCat);
            }

        $category->posts()->delete();
        $category->delete();

        return redirect('admin23/category')->with('message', 'Category deleted with all the posts belongs to it');

       }
       else {
        return redirect('admin23/category')->with('message', 'No Category ID Found ');
       }
    }
}
