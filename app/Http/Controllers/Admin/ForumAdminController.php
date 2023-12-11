<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;

class ForumAdminController extends Controller
{
    public function index()
    {

        $forums = Forum::orderBy('created_at', 'DESC')->paginate(30);

        return view('admin23.adminForum.index', compact('forums'));

    }


    public function destroy(Forum $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'செய்தி நீக்கப்பட்டுள்ளது');
    }
}
