<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdminListingAdsController extends Controller
{
    public function publishedAds()
    {
        $ads = Advertisement::where('published', '1')->latest()->paginate(30);
        return view('admin23.ads.listing.published-ads', compact('ads'));
    }


    public function unpublishedAds()
    {
        $ads = Advertisement::where('published', '0')->latest()->paginate(30);
        return view('admin23.ads.listing.unpublished-ads', compact('ads'));
    }


    public function publishNow($id)
    {
        $publishStatus = Advertisement::find($id);

        $publishStatus->published = '1';
        $publishStatus->save();

        return back();
    }
}
