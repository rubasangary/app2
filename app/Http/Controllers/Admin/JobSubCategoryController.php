<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSubcategory;
use App\Models\Jobcategory;
use Illuminate\Support\Str;
use App\Http\Requests\JobSubcategoryFormRequest;
use App\Http\Requests\JobSubcategoryUpdateRequest;

class JobSubCategoryController extends Controller
{
    public function index()
    {
        $jobsubcategories = JobSubcategory::get();
        return view('admin23.jobs.jobSubcategory.index', compact('jobsubcategories'));
    }

    public function create()
    {
        $jobcategories = Jobcategory::get();
        return view('admin23.jobs.jobSubcategory.create', compact('jobcategories'));
    }


    public function store(JobSubcategoryFormRequest $request)
    {
        $request->validated();

        JobSubcategory::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'jobscategory_id' => $request->jobscategory_id
        ]);

        return back();
    }


    public function edit($id)
    {
        $jobcategories = Jobcategory::get();
        $jobsubcategories = JobSubcategory::find($id);
        return view('admin23.jobs.jobSubcategory.edit', compact('jobcategories', 'jobsubcategories'));
    }


    public function update(JobSubcategoryUpdateRequest $request, $id)
    {
        JobSubcategory::find($id)->update([
            'name' => $request->name,
            'jobscategory_id' => $request->jobscategory_id
        ]);
        return redirect('admin23/jobs-subcategory')->with('message', 'Subcategory updated');
    }

    // public function destroy($id)
    // {
    //     JobSubcategory::find($id)->delete();
    //     return back()->with('message', 'Subcategory removed');
    // }

}
