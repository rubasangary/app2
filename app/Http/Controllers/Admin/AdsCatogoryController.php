<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\http\Requests\Admin\AdsCategoryFormRequest;
use App\Models\Adscategory;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class AdsCatogoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Adscategory::get();
        return view('admin23.ads.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin23.ads.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsCategoryFormRequest $request)
    {

            $request->validated();

            if($request->hasFile('image')){

            $file = $request->file('image');
            $imageName = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(300,200)->save('storage/ads/category/'. $imageName);

            Adscategory::create([
                'name' => $name = $request->name,
                'slug' => Str::slug($name),
                'image' => $imageName
            ]);

            return redirect('admin23/adscategory')->with('message', 'Category added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = Adscategory::find($id);
        return view('admin23.ads.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $adscategory = Adscategory::find($id);

        if($request->hasFile('image')){

            $destinations = 'storage/ads/category/'. $adscategory->image;

            if(File::exists($destinations)){
                File::delete($destinations);
            }


            $file = $request->file('image');
            $imageName = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(300,200)->save('storage/ads/category/'. $imageName);

            $adscategory->update([
                'name' => $request->name,
                'image' => $imageName
            ]);
        }
        else {
            $adscategory->update(['name' => $request->name]);
        }
        // $adscategory->update(['name' => $request->name]);
        return redirect('admin23/adscategory')->with('message', 'Category updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adscategory = Adscategory::find($id);

        if ($adscategory) {

         $destination = 'storage/ads/category/'. $adscategory->image;

             if(File::exists($destination)){
                 File::delete($destination);
             }

         $adscategory->delete();
         return redirect('admin23/adscategory')->with('message', 'Category deleted');

        }
        else {
         return redirect('admin23/adscategory')->with('message', 'No Category ID Found ');
        }
    }
}
