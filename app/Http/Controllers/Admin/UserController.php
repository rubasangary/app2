<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin23.user.index', compact('users'));
    }


    public function edit($user_id){

        $user = User::find($user_id);
        return view('admin23.user.edit', compact('user'));
    }


    public function update(Request $request, $user_id){

        $user = User::find($user_id);

        if($user){

            $user->role = $request->role;
            $user->isBan = $request->isBan;
            $user->update();
            return redirect('admin23/users')->with('message', 'User role updated successfully');
        }

        return redirect('admin23/users')->with('message', 'No user found');

    }
}
