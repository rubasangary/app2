<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\http\Requests\JobCategoryFormRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class JobCategoryController extends Controller
{
    public function index()
    {
        $jobCategories = JobCategory::get();
        return view('admin23.jobs.jobCategory.index', compact('jobCategories'));
    }


    public function create()
    {
        return view('admin23.jobs.jobCategory.create');
    }


    public function store(JobCategoryFormRequest $request)
    {

            $request->validated();

            if($request->hasFile('image')){

            $file = $request->file('image');
            $imageName = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(300,200)->save('storage/ads/category/'. $imageName);

            JobCategory::create([
                'name' => $name = $request->name,
                'slug' => Str::slug($name),
                'image' => $imageName
            ]);

            return redirect('admin23/jobs-category')->with('message', 'Category added successfully');
        }
    }


    public function edit(Request $request, $id)
    {
        $jobCategories = JobCategory::find($id);
        return view('admin23.jobs.jobCategory.edit', compact('jobCategories'));
    }



    public function update(Request $request, $id)
    {


        $jobscategory = JobCategory::find($id);

        if($request->hasFile('image')){

            $destinations = 'storage/ads/category/'. $jobscategory->image;

            if(File::exists($destinations)){
                File::delete($destinations);
            }


            $file = $request->file('image');
            $imageName = time() . '.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(300,200)->save('storage/ads/category/'. $imageName);

            $jobscategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $imageName
            ]);
        }
        else {
            $jobscategory->update(['name' => $request->name]);
        }
        // $adscategory->update(['name' => $request->name]);
        return redirect('admin23/jobs-category')->with('message', 'Category updated successfully');


    }


    public function destroy($id)
    {
        $jobscategory = JobCategory::find($id);

        if ($jobscategory) {

         $destination = 'storage/ads/category/'. $jobscategory->image;

             if(File::exists($destination)){
                 File::delete($destination);
             }

             $jobscategory->delete();
         return redirect('admin23/jobs-category')->with('message', 'Category deleted');

        }
        else {
         return redirect('admin23/jobs-category')->with('message', 'No Category ID Found ');
        }
    }



}
