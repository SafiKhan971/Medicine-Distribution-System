<?php
// app/Http/Controllers/Auth/GoogleAuthController.php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the socialite process
            return redirect('/')->with('error', 'Unable to fetch user data from Google.');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    public function findOrCreateUser($socialiteUser)
    {
        $user = User::where('email', $socialiteUser->email)->first();

        if ($user) {
            return $user;
        }

        // If the user doesn't exist, create a new user
        return User::create([
            'name' => $socialiteUser->name,
            'email' => $socialiteUser->email,
            'google_id' => $socialiteUser->id,
            'password' => Hash::make('password'),
        ]);
    }
}
