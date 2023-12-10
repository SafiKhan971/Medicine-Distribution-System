<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\DoctorApprovalMail;
use App\Mail\DoctorDisapprovalMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller {

    public function index() {
        $total_patients = User::count();
        $total_doctors = Doctor::count();
        $total_appointments = Appointment::count();
        return view( 'backend.admin.index', compact('total_patients','total_doctors', 'total_appointments') );
    }

    public function profile(){
        return view( 'backend.admin.profile');
    }

        /**
     * Update the user's profile information.
     */
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048', // Adjust file type and size as needed
        ]);

        $admin = Admin::find(session()->get('admin_id'));

        // Update Admin details
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

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

            // Update the admin's profile picture filename with extension in the database
            $admin->picture = $uniqueFilename;
        }

        // Save changes to the admin model
        $admin->update();
        return redirect()->back()->with('success', 'Admin Profile Updated Successfully.');

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
            request()->session()->put( 'admin_email', $admin->email );
            request()->session()->put( 'admin_picture', $admin->picture );
            // flash( 'Logged In Successfully!' )->success();
            return redirect()->intended( RouteServiceProvider::ADMIN_HOME )->with('success', 'Logged In Successfully!');
        } else {
            return redirect()->back()->with('error','Invalid Login Credentials!');
        }
    }

    public function destroy() {
        session()->forget( 'admin_id' );
        // flash( 'Logged Out Successfully!' )->success();
        return redirect( 'admin/login' )->with('success','Logged Out Successfully!');
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

    public function detailsDoctor( $id ) {
        $doctor = Doctor::find( $id );
        return view( 'backend.admin.doctors.details', compact('doctor'));
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find( $id );
        $doctor->delete();
        return Redirect::to( '/admin/doctors' )->with( 'success', 'Doctor Deleted Successfully!' );
    }

    public function doctorApprove($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor) {
            // Update status and password fields
            $doctor->status = 1;
            $doctor->password = bcrypt('123456');
            $doctor->save();

            // Send approval email
            $password = '123456';
            Mail::to($doctor->email)->send(new DoctorApprovalMail($doctor, $password));

            return redirect()->back()->with('success', 'Doctor approved successfully and email has been sent to that doctor.');
        }
    }

    public function doctorDisapproveView($id)
    {
        $doctor = Doctor::find($id);
        return view('backend.admin.doctors.doctor_disapproval', compact('doctor'));
    }

    public function doctorDisapprove(Request $request)
    {
        $doctor = Doctor::find($request->id);
        // dd($doctor);
        if ($doctor) {
            // Update status
            $doctor->status = 0;
            $doctor->save();

            // Send Disapproval email
            $disapproval_reason = $request->disapproval_reason;
            Mail::to($doctor->email)->send(new DoctorDisapprovalMail($doctor, $disapproval_reason));

            return redirect()->to('admin/doctors')->with('success', 'Doctor disapproved successfully and email has been sent to that doctor.');
        }
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
                // flash('Appointment updated successfully!')->success();
                return redirect('admin/appointments')->with('success', 'Appointment updated successfully!');
        }
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        // flash('Appointment Deleted Successfully!')->success();
        return redirect()->back()->with('success', 'Appointment Deleted Successfully!');
    }
}
