<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;




class SettingsController extends Controller
{

    public function settings()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.settings.settings', compact('user'));
    }

    // public view
    public function viewUserInfo($slug)
    {
        $setting = Setting::whereHas('bioData', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        $user = $setting->bioData;

        return view('user.settings.userinfo-public-view', compact('user', 'setting'));
    }


    public function editSettings()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.settings.edit-settings', compact('user'));
    }

    // update social Links
    public function socialLinks(Request $request)
    {
        $rules = [
            'facebook' => ['nullable', 'max:255', 'url', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/.+/i'],
            'youtube' => ['nullable', 'max:255', 'url', 'regex:/^(https?:\/\/)?(www\.)?youtube\.com\/.+/i'],
            'instagram' => ['nullable', 'max:255', 'url', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/.+/i'],
            'pinterest' => ['nullable', 'max:255', 'url', 'regex:/^(https?:\/\/)?(www\.)?pinterest\.com\/.+/i'],
        ];

        $validated = $request->validate($rules);

        $user = Auth::user();

        $settings = Setting::updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );

        return redirect()->route('settings')->with('message', 'Social links updated successfully');
    }

    // update social Links
    public function personalInfo(Request $request)
    {
        $rules = [
            'fullname' => ['nullable', 'string', 'max:255'],
            'about' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'max:255', 'url', 'regex:/^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,6}([\/\w\.-]*)*\/?$/'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255', 'regex:/^[0-9]{10,15}$/'],
            'mobile' => ['nullable', 'string', 'max:255', 'regex:/^[0-9]{10,15}$/'],
        ];

        $validated = $request->validate($rules);

        $user = Auth::user();

        $settings = Setting::updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );

        return redirect()->route('settings')->with('message', 'Business/Personal Info updated successfully');
    }


    public function showUploadForm()
    {
        return view('user.settings.crop-imageForm');
    }





    public function cropImageUploadAjax(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $folderPath = storage_path('app/public/banners/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath . $imageName;

        // Delete the old image using File::delete
        if ($user->setting && !empty($user->setting->banner)) {
            $oldImage = $user->setting->banner;
            $oldImagePath = $folderPath . $oldImage;

            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Setting;
        $saveFile->banner = $imageName;

        // Check if the user has a related setting, and if not, create a new setting record
        if (!$user->setting) {
            $setting = new Setting(['user_id' => $user->id, 'banner' => $imageName]);
            $user->setting()->save($setting);
        } else {
            // Update the banner in the user's setting
            $user->setting->update(['banner' => $imageName]);
        }

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }


}
