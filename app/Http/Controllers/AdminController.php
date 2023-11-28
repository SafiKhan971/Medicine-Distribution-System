<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller {

    public function index() {
        return view( 'backend.admin.index' );
    }

    public function login() {
        // Set the page title dynamically
        $title = 'Mediplus | Admin Login';

        // Return the view with the title
        return view( 'backend.admin.login' )->with( 'title', $title );
    }

    public function store( Request $request ) {

        $admin = Admin::where( 'email', $request->email )->first();

        if ( $admin && Hash::check( $request->password, $admin->password ) ) {
            request()->session()->put( 'admin_id', $admin->id );
            request()->session()->put( 'admin_name', $admin->name );
            // flash( 'Logged In Successfully!' )->success();
            return redirect()->intended( RouteServiceProvider::ADMIN_HOME );
        } else {

        }
    }

    public function destroy() {
        session()->forget( 'admin_id' );
        flash( 'Logged Out Successfully!' )->success();
        return redirect( 'admin/login' );
    }

    // Patient Functions

    public function patientsList() {
        $patients = User::orderBy( 'name', 'ASC' )->get();
        return view( 'backend.admin.patients.index', compact( 'patients' ) );
    }

    // Doctors Functions

    public function doctorsList() {
        $doctors = Doctor::orderBy( 'name', 'ASC' )->get();
        return view( 'backend.admin.doctors.index', compact( 'doctors' ) );
    }

    public function updateDoctor($id){
        $doctor = Doctor::find('id',$id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->update();
        
        return view( 'backend.admin.doctors.index', compact( 'doctors' ) );
    }
}
