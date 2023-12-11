<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;

class SaveThisAdController extends Controller
{

    public function saveAd(Request $request)
    {
        $ad = Advertisement::find($request->adId);
        //userads is a relationship setter with Advertisement Modal
		$ad->userads()->syncWithOutDetaching($request->userId);
    }

    public function getMyads()
	{
		$advertisementId = DB::table('advertisement_user')
        ->where('user_id', auth()->user()->id)
		->pluck('advertisement_id');
		$ads = Advertisement::latest()->whereIn('id', $advertisementId)->get();
		return view('frontend.seller.saved-ads', compact('ads'));

	}

    public function removeAd(Request $request)
    {

        DB::table('advertisement_user')->where('user_id', auth()->user()->id)
        ->where('advertisement_id', $request->adId)->delete();
        return back()->with('message', 'Ad removed from the saved list');

    }

}
