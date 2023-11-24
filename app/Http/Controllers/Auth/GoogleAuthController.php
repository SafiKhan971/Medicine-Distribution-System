<?php
// app/Http/Controllers/Auth/GoogleAuthController.php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // You can now use $user->id, $user->name, $user->email, etc. to store user data or log in the user.

        // For example, you can create a user in your database if they don't exist
        // and log them in using Laravel's Auth facade.

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    private function findOrCreateUser($googleUser)
    {
        // Find or create a user in your database based on the Google user information.
        // You can customize this logic based on your application's requirements.

        // Example:
        $user = User::where('google_id', $googleUser->id)->first();
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                // Add other required fields as needed
            ]);
        }

        // return $user;

        // You may want to customize this logic based on your application's requirements.
        // The goal is to find or create a user in your application's database.
    }
}
