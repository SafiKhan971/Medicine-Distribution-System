<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Document;
use App\Models\Feedback;
use App\Models\Appointment;
use App\Models\HealthRecord;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller {

    public function index() {
        $total_patients = User::count();
        // $doctor_notification = Notification::where('doctor_id', $doctor_id)->get();

        $doctor = Doctor::find(session()->get('doctor_id'));
        $future_appointments = Appointment::where('doctor_id', $doctor->id)->where('app_dt_start', '>=' , now())->count();
        $health_records = HealthRecord::where('doctor_id', $doctor->id)->count();
        return view( 'frontend.doctor.index', compact('total_patients', 'future_appointments', 'health_records') );
    }

    public function login() {
        return view( 'frontend.doctor.login' );
    }

    public function store( Request $request ) {

        $doctor = Doctor::where( 'email', $request->email )->first();

        if (!$doctor) {
            // Doctor not found
            return redirect('doctor/login')->withErrors(['error' => 'Invalid email or password']);
        }

        if ($doctor->password === null) {
            // Password in the database is null
            return redirect('doctor/login')->withErrors(['error' => 'Password is not set for this account']);
        }

        if ($request->password === null) {
            // Password is null
            return redirect('doctor/login')->withErrors(['error' => 'Password is required']);
        }

        if ( $doctor && Hash::check( $request->password, $doctor->password ) ) {
            // request()->session()->put( 'doctor_id', $doctor->id );
            session(['doctor_id' => $doctor->id]);
            $id = session('doctor_id');
            // dd($id);
            request()->session()->put( 'doctor_name', $doctor->name );
            request()->session()->put( 'doctor_email', $doctor->email );
            request()->session()->put( 'doctor_picture', $doctor->picture );
            request()->session()->put( 'doctor_start_time', $doctor->start_time );
            request()->session()->put( 'doctor_end_time', $doctor->end_time );
            // flash( 'Logged In Successfully!' )->success();
            return redirect( 'doctor/dashboard' )->with('success','Logged In Successfully!');
        } else {
            return redirect( 'doctor/login' )->withErrors( [ 'error' => 'Invalid email or password' ] );
        }
    }

    public function basic_info()
    {
        return view('frontend.doctor.basic_information.index');
    }

    /**
    * Update the docotr's profile information.
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
        $doctor->start_time = $request->input('start_time');
        $doctor->end_time = $request->input('end_time');

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

            // Update the profile picture filename in the session
            session(['doctor_picture' => $uniqueFilename]);
        }

        // Save changes to the doctor model
        $doctor->update();

        // Update other doctor details in the session
        session(['doctor_name' => $doctor->name]);
        session(['doctor_email' => $doctor->email]);
        session(['doctor_start_time' => $doctor->start_time]);
        session(['doctor_end_time' => $doctor->end_time]);

        return redirect()->back()->with('success', 'Doctor Profile Updated Successfully.');
    }

    public function create() {
        return view( 'frontend.doctor.register' );
    }

    public function register(Request $request)
    {
        $doctor = new Doctor;

        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Doctor::class],
        ]);

        if ($validator->fails()) {
            // Validation failed, return the validation errors
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } else {
            // Validation passed, proceed with saving the Doctor Details

            // Personal
            $dob = $request->birth_year . '-' . str_pad($request->birth_month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->birth_date, 2, '0', STR_PAD_LEFT);

            $doctor->name = $request->full_name;
            $doctor->email = $request->email;
            $doctor->phone_no = $request->phone_no;
            $doctor->nationality = $request->nationality;
            $doctor->dob = $dob;
            $doctor->gender = $request->Gender;
            // $doctor->profile_picture = $request->profile_picture;
            // $doctor->medical_license_picture = $request->medical_license_picture;

            // Handle profile picture
            if ($request->hasFile('profile_picture')) {
                $profilePicture = $request->file('profile_picture');
                $profilePicture->storeAs('public/doctorfiles', $profilePicture->getClientOriginalName());
                $doctor->profile_picture = $profilePicture->getClientOriginalName();
            }

            // Handle medical license picture
            if ($request->hasFile('medical_license_picture')) {
                $medicalLicensePicture = $request->file('medical_license_picture');
                $medicalLicensePicture->storeAs('public/doctorfiles', $medicalLicensePicture->getClientOriginalName());
                $doctor->medical_license_picture = $medicalLicensePicture->getClientOriginalName();
            }

            // Professional
            $doctor->medical_license_no = $request->medical_license_no;
            $doctor->specialization = $request->specialization;
            $doctor->experience = $request->experience;
            $doctor->board_certifications = $request->board_certifications;

            // Affiliation
            $doctor->clinic_name = $request->clinic_name;
            $doctor->clinic_email = $request->clinic_email;
            $doctor->clinic_phone = $request->clinic_phone;
            $doctor->clinic_address = $request->clinic_address;

            // Availability
            $doctor->days_week = $request->days_week;
            $doctor->start_time = $request->start_time;
            $doctor->end_time = $request->end_time;

            // dd($doctor);

            $doctor->save();

            // Provide a success message
            $successMessage = 'Thank you for Registration! We will let you know through email if your account is approved by Admin.';

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => $successMessage]);
            } else {
                // Flash message for non-AJAX requests
                flash($successMessage)->success();
                return redirect()->back();
            }
        }
    }

    public function register_old( Request $request ) {
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
        // flash( 'Logged Out Successfully!' )->success();
        notify()->success('Logged Out Successfully!', 'Success');
        return redirect( '/doctor/login' );
    }

    public function patient_hr_index()
    {
        $patient_records = User::all();
        return view('frontend.doctor.patient_health_record.index', compact('patient_records'));
    }

    public function show($id)
    {
        $record = HealthRecord::where('id', $id)->first();
        $documents = Document::where('health_record_id', $id)->get();
        return view('frontend.doctor.patient_health_record.show', compact('record', 'documents'));
    }

    // Appointments
    public function getAppointment()
    {
        // $appointments = Appointment::with('doctor')->get();
        $appointments = Appointment::where('doctor_id', session()->get('doctor_id'))->where('app_dt_start', '>=', now())->get();
        return view('frontend.doctor.appointments.index', compact('appointments'));
    }

    // Video Consultation Requests
    public function getVideoConsultationRequests()
    {
        $consultations = Notification::where('type', 'video_call_request')
                        ->where('doctor_id', session()->get('doctor_id'))
                        ->where('status',0)->get();
        return view('frontend.doctor.consultations.index', compact('consultations'));
    }

}
