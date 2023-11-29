<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Appointment;
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

    public function deletePatient($id)
    {
        $doctor = User::find( $id );
        $doctor->delete();
        return Redirect::to( '/admin/patients' )->with( 'success', 'Patient Deleted Successfully!' );
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

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find( $id );
        $doctor->delete();
        return Redirect::to( '/admin/doctors' )->with( 'success', 'Doctor Deleted Successfully!' );
    }

    // Appointments
    public function getAppointment()
    {
        $appointments = Appointment::with('doctor')->get();
        return view('backend.admin.appointments.index', compact('appointments'));
    }

    public function editAppointment($id)
    {
        $appointment = Appointment::with('doctor')->find($id);
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.admin.appointments.edit', compact('appointment', 'doctors'));
    }

    public function updateAppointment(Request $request, $id)
    {   
        $userId = auth()->user()->id;
        $appointmentStartTime = Carbon::parse($request->app_date_time);
        $appointmentEndTime = $appointmentStartTime->copy()->addMinutes(30);
        $startDt = $request->app_date_time;

        $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
        ->where(function ($query) use ($startDt) {
            $query->where('app_dt_start', '<=', $startDt)
                ->where('app_dt_end', '>=', $startDt);
        })
        ->first();
        if(!empty($existingAppointment))
        {
            flash('Appointment Not Available!')->error();
            return redirect('admin/appointments');
        }
        else
        {   
            $appointment = Appointment::find($id);
                $appointment->doctor_id =  $request->doctor_id;
                $appointment->app_dt_start = $appointmentStartTime;
                $appointment->app_dt_end =  $appointmentEndTime;
                $appointment->save();
                flash('Appointment updated successfully!')->success();
                return redirect('admin/appointments');
        }
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        flash('Appointment Deleted Successfully!')->success();
        return redirect()->back();
    }
}
