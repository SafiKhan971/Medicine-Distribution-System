<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

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

    public function updatePatientView( $id ) {
        $patient = User::find( $id );
        // dd($patient);
        return view( 'backend.admin.patients.update', compact( 'patient' ) );
    }

    public function updatePatient( Request $request ) {
        // dd( $request->all() );
        $patients = User::find( $request->id );
        $patients->name = $request->name;
        $patients->email = $request->email;
        $patients->update();

        return Redirect::to( '/admin/patients' )->with( 'success', 'Patient Updated Successfully!' );
    }

    // Doctors Functions

    public function doctorsList() {
        $doctors = Doctor::orderBy( 'name', 'ASC' )->get();
        return view( 'backend.admin.doctors.index', compact( 'doctors' ) );
    }

    public function updateDoctorView( $id ) {
        $doctor = Doctor::find( $id );
        return view( 'backend.admin.doctors.update', compact( 'doctor' ) );
    }

    public function updateDoctor( Request $request ) {
        // dd( $request->all() );
        $doctor = Doctor::find( $request->id );
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->update();

        return Redirect::to( '/admin/doctors' )->with( 'success', 'Doctor Updated Successfully!' );
    }
}
