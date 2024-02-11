<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller
{
    /**
     * Google Authorisation
     */
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Google Authorisation
     */
    public function google_callback()
    {
        $google = Socialite::driver('google')->user();

        $user = User::where('email', $google->email)->get();

        if (count($user) > 0) {
            $user = $user[0];

            User::where('email', $google->email)->update([
                'google_auth' => $google->id
            ]);

            Auth::loginUsingId($user->id);

            return redirect(RouteServiceProvider::HOME);
        } else {
            $google = Socialite::driver('google')->user();

            $user = User::create([
                'name' => $google->name,
                'email' => $google->email,
                'password' => Hash::make($google->email),
                'google_auth' => $google->id
            ]);

            event(new Registered($user));

            $user->assignRole('user');

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }

    /**
     * Facebook Authorisation
     */
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Facebook Authorisation
     */
    public function facebook_callback()
    {
        $facebook = Socialite::driver('facebook')->user();

        $user = User::where('email', $facebook->email)->get();

        if (count($user) > 0) {
            $user = $user[0];

            User::where('email', $facebook->email)->update([
                'facebook' => $facebook->id
            ]);

            Auth::loginUsingId($user->id);

            return redirect(RouteServiceProvider::HOME);
        } else {
            $facebook = Socialite::driver('facebook')->user();

            $user = User::create([
                'name' => $facebook->name,
                'email' => $facebook->email,
                'password' => Hash::make($facebook->email),
                'facebook' => $facebook->id
            ]);

            event(new Registered($user));

            $user->assignRole('user');

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
