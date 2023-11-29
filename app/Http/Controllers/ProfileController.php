<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.patient.index');
    }

    public function basic_info()
    {
        return view('frontend.patient.basic_information.index');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048', // Adjust file type and size as needed
        ]);
        
        $user = User::find(auth()->user()->id);
        
        // Update user details
        $user->name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->dob = $request->input('dob');
        
        // Handle Picture Update
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
        
            // Check if the file size is greater than 2048 kilobytes (2 MB)
            if ($file->getSize() > 2048 * 1024) {
                return redirect()->back()->withErrors(['picture' => 'The image size must not exceed 500 KB.']);
            }
        
            // Generate a new unique filename
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $uniqueFilename = $filename . '.' . $extension;
        
            // Store the uploaded file in the storage/app/public directory with the new unique filename
            $path = $file->storeAs('public/profile_pictures', $uniqueFilename);
        
            // Update the user's profile picture filename with extension in the database
            $user->picture = $uniqueFilename;
        }
        
        // Save changes to the user model
        $user->update();
        return redirect()->back()->with('success', 'Profile Updated Successfully.');
        
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
