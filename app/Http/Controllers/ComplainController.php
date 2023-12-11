<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        Complain::create([
            'ad_id' => $request->ad_id,
            'user_id' => $user_id, // Use the $user_id variable you obtained from Auth
            'reason' => $request->reason,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return back()->with('message', 'Your report has been recorded. Thank you for informing us');
    }

    // Admin section
    public function reportedAds()
    {
        $complain = Complain::paginate(20);
        return view('admin23.complains.reported-ads', compact('complain'));
    }


    public function destroy($id)
    {
        $complain = Complain::find($id);
        $complain->delete();
        return view('admin23.complains.reported-ads', compact('complain'));
    }


    public function remove($ad_id)
    {
        $comp = Complain::find($ad_id);
        $comp->delete();
        return redirect()->route('all.reported.ads');

    }

}
