<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\JobSubcategory;
use App\Models\Joblisting;


class JobsController extends Controller
{
    public function jobSearch()
    {
        $jobMenuItems = JobCategory::with('JobSubcategory')->get();

        $jobs = Joblisting::where('published', 1)->orderBy('created_at', 'DESC')->get();

        return view('frontend.jobs.show-all-jobs', compact('jobMenuItems', 'jobs'));
    }


    public function JobFilter($slug)
    {
        $jobMenu = JobCategory::with('JobSubcategory')->get();

        if(Joblisting::where('slug', $slug))
        {
            $category = JobCategory::where('slug', $slug)->first();
            $jobsFilter = Joblisting::where('job_category_id', $category->id)->where('published', 1)->get();

            return view('frontend.jobs.jobFilter', compact('jobMenu', 'jobsFilter'));
        }

        else
        {
            return back()->message('Sorry! The category not found');
        }

    }


    public function showJob($id)
    {
        $job = Joblisting::where('id', $id)->where('published', 1)->first();

        return view('frontend.jobs.job-detail', compact('job'));
    }



}
