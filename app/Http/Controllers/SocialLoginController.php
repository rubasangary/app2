<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function CallbackGoogle()
    {
        try {

            $googleUser = Socialite::driver('google')->user();

            $user = User::firstOrNew(['google_id' => $googleUser->getId()]);

            if (!$user->exists) {
                $user->name = $googleUser->getName();
                $user->email = $googleUser->getEmail();
                $user->google_id = $googleUser->getId();

                // Use Google profile picture as the avatar
                $user->avatar = $googleUser->getAvatar();

                // Modify the name to create a unique slug
                $slug = Str::slug($user->name);
                $user->slug = User::where('slug', $slug)->exists()
                    ? $slug . '-' . uniqid()
                    : $slug;

                // Mark the email as verified
                $user->email_verified_at = now();

                $user->save();

            }

            Auth::login($user);

            return redirect()->intended('/user/dashboard');

            } catch (\Throwable $th) {

                dd('Something Went Wrong!' . $th->getMessage());

            }
            
    }

}


