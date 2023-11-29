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
            flash( 'Logged In Successfully!' )->success();
            return redirect( 'doctor/dashboard' );
        } else {
            return redirect( 'doctor/login' )->withErrors( [ 'error' => 'Invalid Email or Password' ] );
        }
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
        return redirect( '/' );
    }

}
