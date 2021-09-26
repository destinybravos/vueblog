<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function google_signup()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        $google_user = Socialite::driver('google')->user();
        
        // Check if User Exists in Our record
        if (User::where('google_id', $google_user->id)->exists()) {
            //Login the user
            $user = User::where('google_id', $google_user->id)->first();
        }else{
            //Create a New User
            $user = new User;
            $user->google_id = $google_user->id;
            $user->firstname = $google_user->user['given_name'];
            $user->lastname = $google_user->user['family_name'];
            $user->email = $google_user->email;
            $user->profile_photo_path = $google_user->avatar;
            $user->save();
        }

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function facebook_signup()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback(Request $request)
    {
        if ($request->has('error_code')) {
            return $request->error_message;
        }else{
            $facebook_user = Socialite::driver('facebook')->user();
            // Check if User Exists in Our record
            if (User::where('facebook_id', $facebook_user->id)->exists()) {
                //Login the user
                $user = User::where('facebook_id', $facebook_user->id)->first();
            }else{
                $username = explode(' ', $facebook_user->name);
                //Create a New User
                $user = new User;
                $user->facebook_id = $facebook_user->id;
                $user->firstname = $username[0];
                $user->lastname = $username[1];
                $user->email = $facebook_user->email;
                $user->profile_photo_path = $facebook_user->avatar;
                $user->save();
            }
            Auth::login($user);
            return redirect()->route('dashboard');
        }
    }
}
