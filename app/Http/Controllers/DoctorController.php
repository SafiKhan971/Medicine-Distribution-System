<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller {

    public function index() {
        return view( 'frontend.doctor.index' );
    }

    public function login() {
        return view( 'frontend.doctor.login' );
    }

    public function store( Request $request ) {

        $doctor = Doctor::where( 'email', $request->email )->first();

        if ( $doctor && Hash::check( $request->password, $doctor->password ) ) {
            request()->session()->put( 'doctor_id', $doctor->id );
            request()->session()->put( 'doctor_name', $doctor->name );
            request()->session()->put( 'doctor_email', $doctor->email );
            request()->session()->put( 'doctor_picture', $doctor->picture );
            // flash( 'Logged In Successfully!' )->success();
            return redirect( 'doctor/dashboard' )->with('success','Logged In Successfully!');
        } else {
            return redirect( 'doctor/login' )->withErrors( [ 'error' => 'Invalid Email or Password' ] );
        }
    }

    public function basic_info()
    {
        return view('frontend.doctor.basic_information.index');
    }

    /**
    * Update the user's profile information.
    */
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048', // Adjust file type and size as needed
        ]);

        $doctor = Doctor::find(session()->get('doctor_id'));

        // Update Doctor details
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');

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

            // Update the doctor's profile picture filename with extension in the database
            $doctor->picture = $uniqueFilename;
        }

        // Save changes to the doctor model
        $doctor->update();
        return redirect()->back()->with('success', 'Doctor Profile Updated Successfully.');

    }

    public function create() {
        return view( 'frontend.doctor.register' );
    }

    public function register( Request $request ) {
        $doctor = new Doctor;

        $validator = Validator::make( $request->all(), [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class ],
            'password' => [ 'required', 'confirmed', Rules\Password::defaults() ],
        ] );

        if ( $validator->fails() ) {
            // Validation failed, return the validation errors
            return redirect()->back()->withErrors( $validator )->withInput();
        } else {
            // Validation passed, proceed with saving the Doctor
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->password = Hash::make( $request->password );
            $doctor->save();

            request()->session()->put( 'doctor_id', $doctor->id );
            flash( 'Account Created Successfully!' )->success();
            return redirect( 'doctor/dashboard' );
        }

    }

    public function destroy() {
        session()->forget( 'doctor_id' );
        flash( 'Logged Out Successfully!' )->success();
        return redirect( '/doctor/login' );
    }

}
