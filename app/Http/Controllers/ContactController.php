<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;


class ContactController extends Controller
{
    public function show()
    {

            $user = Auth::user();


            return view('originals.contact', compact('user'));

    }

    public function submit(Request $request)
    {
        $validated = $request->validate(
            ['message' => 'required', 'string', 'max:255'],

            [
                'message.required' => 'The message field is required.',
                'message.string' => 'The message must be a string.',

                ]);

        $user = Auth::user();

        $data['user_id'] = $user->id;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['message'] = $validated['message'];

        Contact::create($data);

        return redirect()->route('contact.show')->with('message', 'Message sent successfully!');
    }
}
