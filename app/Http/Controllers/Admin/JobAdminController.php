<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joblisting;

class JobAdminController extends Controller
{
    public function jobs()
    {
        $ads = Joblisting::where('published', '1')->latest()->paginate(30);
        return view('admin23.jobs.listings.published-jobs', compact('ads'));
    }


    public function pendingJobs()
    {
        $ads = Joblisting::where('published', '0')->latest()->paginate(30);
        return view('admin23.jobs.listings.pending-jobs', compact('ads'));
    }


    public function publishJobNow($id)
    {
        $publishStatus = Joblisting::find($id);

        $publishStatus->published = '1';
        $publishStatus->save();

        return back();
    }


}
