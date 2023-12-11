<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joblisting;
use App\Http\Requests\JobListingFormRequest;
use App\Http\Requests\JobUpdateFormRequest;
use Intervention\Image\ImageManagerStatic as Image;

class JobsAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Joblisting::latest()->where('user_id', auth()->user()->id)->where('published', 1)->get();
        return view('frontend.jobs.JobsByUser', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.jobs.jobAdForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobListingFormRequest $request)
    {

        $data = $request->validated();

        if($request->hasFile('logo')){

        $file = $request->file('logo');
        $imageName = time() . uniqid() . '.'. $file->getClientOriginalExtension();
        Image::make($file)->resize(600,400)->save('storage/ads/jobs/'.$imageName);
        }

        $data['logo'] = $imageName;

        $data['slug'] = str_replace(' ', '-', $request->name);
        $data['user_id'] = auth()->user()->id;

        Joblisting::create($data);
        return redirect('user/job-pending')->with('message','Your ad was saved!');

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
    public function edit($id)
    {
        $ad = Joblisting::find($id);
        $this->authorize('edit-ad', $ad);

        return view('frontend.jobs.job-edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobUpdateFormRequest  $request, $id)
    {
        $ad = Joblisting::find($id);

        $data = $request->validated();

         $data['slug'] = $request->name;
         $data['user_id'] = auth()->user()->id;


         $ad->update($data);
         return redirect('user/job-ad-display')->with('message','Your ad has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Joblisting::find($id);
        $ad->delete();
        return back()->with('message', 'Ad deleted successfully');
    }


    public function userPendingJobs()
    {
        $ads = Joblisting::where('user_id', auth()->user()->id)->where('published', 0)->get();

        return view('frontend.jobs.pending-jobs', compact('ads'));
    }
}
