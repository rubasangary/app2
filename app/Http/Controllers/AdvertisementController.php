<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Advertisement;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdsFormRequest;
use App\Http\Requests\AdsFormUpdateRequest;
use Illuminate\Support\Facades\Gate;


class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $ads = Advertisement::latest()->where('user_id', auth()->user()->id)->get();
        return view('frontend.seller.display', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  public function store(AdsFormRequest $request)
    // {
    //     $data = $request->validated();

    //     if ($request->hasFile('feature_image')) {
    //         $file1 = $request->file('feature_image');
    //         $imageName = time() . uniqid() . '.' . $file1->getClientOriginalExtension();
    //         Image::make($file1)->fit(600, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save('storage/ads/seller/' . $imageName);
    //         $data['feature_image'] = $imageName;
    //     }

    //     if ($request->hasFile('second_image')) {
    //         $file2 = $request->file('second_image');
    //         $imageNameTwo = time() . uniqid() . '.' . $file2->getClientOriginalExtension();
    //         Image::make($file2)->fit(600, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save('storage/ads/seller/' . $imageNameTwo);
    //         $data['second_image'] = $imageNameTwo;
    //     }

    //     if ($request->hasFile('third_image')) {
    //         $file3 = $request->file('third_image');
    //         $imageNameThree = time() . uniqid() . '.' . $file3->getClientOriginalExtension();
    //         Image::make($file3)->fit(600, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save('storage/ads/seller/' . $imageNameThree);
    //         $data['third_image'] = $imageNameThree;
    //     }

    //     $data['slug'] = str_replace(' ', '-', $request->name);
    //     $data['user_id'] = Auth::user()->id;

    //     Advertisement::create($data);
    //     return redirect('user/ads/display')->with('message', 'Your ad was saved!');
    // }



    public function store(AdsFormRequest $request)
    {
        // dd($request->all());

        $data = $request->validated();


        if($request->hasFile('feature_image')){

        $file1 = $request->file('feature_image');
        $imageName = time() . uniqid() . '.'. $file1->getClientOriginalExtension();
        Image::make($file1)->resize(600, 400)->save('storage/ads/seller/'.$imageName);

        }

        if($request->hasFile('second_image')){

        $file2 = $request->file('second_image');
        $imageNameTwo = time() . uniqid() . '.'. $file2->getClientOriginalExtension();
        Image::make($file2)->resize(600, 400)->save('storage/ads/seller/'.$imageNameTwo);

        }

        if($request->hasFile('third_image')){

        $file3 = $request->file('third_image');
        $imageNameThree = time() . uniqid() . '.'. $file3->getClientOriginalExtension();
        Image::make($file3)->resize(600, 400)->save('storage/ads/seller/'.$imageNameThree);

        }

        $data['feature_image'] = $imageName;
        $data['second_image'] = $imageNameTwo;
        $data['third_image'] = $imageNameThree;


        $data['slug'] = str_replace(' ', '-', $request->name);
        $data['user_id'] = auth()->user()->id;

         Advertisement::create($data);
         return redirect('user/ads/display')->with('message','Your ad was saved!');

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
        $ad = Advertisement::find($id);
        $this->authorize('edit-ad', $ad);

        return view('frontend.seller.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsFormUpdateRequest $request, $id)
    {
        $ad = Advertisement::find($id);

        $data = $request->validated();

         $data['slug'] = $request->name;
         $data['user_id'] = auth()->user()->id;


         $ad->update($data);
         return redirect('user/ads/display')->with('message','Your ad has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Advertisement::find($id);
        $ad->delete();
        return back()->with('message', 'Ad deleted successfully');
    }


    public function pendingAds()
    {
        $ads = Advertisement::where('user_id', auth()->user()->id)->where('published', 0)->get();

        return view('frontend.seller.pending-ads', compact('ads'));
    }
}
