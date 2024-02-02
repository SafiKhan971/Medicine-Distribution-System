<?php

use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthTracker;
use App\Http\Controllers\SearchDoctors;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\DoctorFeedbackController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\PatientFeedbackController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $pageTitle = 'Digital Clinic';
    $feedbacks = Feedback::latest()->where('status', 0)->take(6)->get();
    return view('frontend/index', compact('pageTitle', 'feedbacks'));
});
Route::get('/contact', function () {
    $pageTitle = 'Digital Clinic | Contact Us';
    return view('frontend/contact', compact('pageTitle'));
});
Route::get('/doctors', function () {
    $pageTitle = 'Digital Clinic | Doctors';
    $doctors = Doctor::orderBy('name', 'asc')->take(6)->get();
    return view('frontend/doctors', compact('doctors', 'pageTitle'));
});
Route::get('/blogs', function () {
    $pageTitle = 'Digital Clinic | Blogs';
    $blogs = Blog::orderBy('title', 'asc')->take(6)->get();
    return view('frontend/blogs', compact('blogs', 'pageTitle'));
});
Route::get('/blog/{slug}', function ($blog_slug) {
    $blog = Blog::where('slug', $blog_slug)->first();
    $pageTitle = 'Digital Clinic | '. $blog->title;
    return view('frontend/blog_single', compact('blog', 'pageTitle'));
});
Route::get('/timetable', function () {
    $pageTitle = 'Digital Clinic | Timetable';
    return view('frontend/timetable', compact('pageTitle'));
});
Route::get('/faqs', function () {
    $pageTitle = 'Digital Clinic | FAQs';
    return view('frontend/faqs', compact('pageTitle'));
});
Route::get('/about', function () {
    $pageTitle = 'Digital Clinic | About Us';
    return view('frontend/about', compact('pageTitle'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('prescriptions', PrescriptionController::class);
Route::get('profile/prescription', [PrescriptionController::class, 'patient_index']);

Route::get('getDutyTiming/{id}', [ProfileController::class, 'getDutyTiming']);

Route::group(['prefix' => 'profile', 'middleware' => ['checkLogin', 'verified']], function(){
    // Health tracker
    Route::get('google/login', [ProfileController::class, 'redirectToGoogle']);
    Route::get('google/login/callback', [ProfileController::class, 'handleGoogleCallback']);

    Route::get('/', [ProfileController::class, 'index']);
    Route::get('basic-information', [ProfileController::class, 'basic_info']);
    Route::get('future-appointments', [AppointmentController::class, 'futureAppointments'])->middleware('checkLogin');
    Route::get('past-appointments', [AppointmentController::class, 'pastAppointments'])->middleware('checkLogin');
    Route::get('appointment', [AppointmentController::class, 'create'])->name('profile.appointment');
    Route::post('create-appointment', [AppointmentController::class, 'store'])->name('profile.create.appointment');
    Route::get('appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('profile.update.appointment');
    Route::post('appointment/edit/{id}', [AppointmentController::class, 'update'])->name('profile.edit.appointment');
    Route::get('appointment/delete/{id}', [AppointmentController::class, 'destroy'])->name('profile.delete.appointment');
    Route::get('health-records', [HealthRecordController::class, 'index'])->name('profile.health-records');
    Route::get('health-record', [HealthRecordController::class, 'view'])->name('profile.health-record.view');
    Route::get('create-health-record', [HealthRecordController::class, 'create'])->name('profile.health.record');
    Route::post('create-health-record', [HealthRecordController::class, 'store'])->name('profile.create.record');
    Route::post('video-call-request', [AppointmentController::class, 'video_call'])->name('profile.store.call_request');

    Route::get('search-for-doctors', [SearchDoctors::class, 'index'])->name('search-doctor.index');

    Route::get('doctor/view/{id}', [SearchDoctors::class, 'view'])->name('profile.doctor.view');

    Route::get('tracker', [HealthTracker::class, 'index'])->name('profile.tracker');

    // Patient Feedback
    Route::get('feedbacks', [PatientFeedbackController::class, 'index'])->name('profile.feedbacks');
    Route::get('create-feedback', [PatientFeedbackController::class, 'create'])->name('profile.create.feedback');
    Route::post('store-feedback', [PatientFeedbackController::class, 'store'])->name('profile.store.feedback');
    Route::get('edit-feedback/{id}', [PatientFeedbackController::class, 'edit'])->name('profile.edit.feedback');
    Route::post('update-feedback/{id}', [PatientFeedbackController::class, 'update'])->name('profile.update.feedback');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['signed']);

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('admin/login', [AdminController::class, 'login'])->middleware('checkAdminLogin')->name('admin.login');
Route::post('admin/login', [AdminController::class, 'store']);

Route::get('doctor/login', [DoctorController::class, 'login'])->middleware('checkDoctorLogin')->name('doctor.login');
Route::post('doctor/login', [DoctorController::class, 'store']);

Route::get('doctor/register', [DoctorController::class, 'create']);
Route::post('doctor/register', [DoctorController::class, 'register'])->name('doctor.register');
Route::post('doctor/registration', [DoctorController::class, 'register']);

Route::post('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


Route::group(['prefix' => 'admin', 'middleware' => 'checkAdmin'], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('profile/update', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
    // Patient routes
    Route::get('patients', [AdminController::class, 'patientsList'])->name('admin.patients');
    Route::get('patient/update/{id}', [AdminController::class, 'updatePatientView']);
    Route::post('patient/update', [AdminController::class, 'updatePatient'])->name('admin.patient.update');
    Route::get('patient/delete/{id}', [AdminController::class, 'deletePatient']);
    // Docotor routes
    Route::get('doctors', [AdminController::class, 'doctorsList'])->name('admin.doctors');
    Route::get('doctor/update/{id}', [AdminController::class, 'updateDoctorView']);
    Route::post('doctor/update', [AdminController::class, 'updateDoctor'])->name('admin.doctor.update');
    Route::get('doctor/details/{id}', [AdminController::class, 'detailsDoctor'])->name('admin.doctor.details');
    Route::get('doctor/delete/{id}', [AdminController::class, 'deleteDoctor']);
    Route::get('/doctor/approve/{id}', [AdminController::class, 'doctorApprove']);
    Route::get('/doctor/disapprove/{id}', [AdminController::class, 'doctorDisapproveView']);
    Route::post('/doctor/disapprove', [AdminController::class, 'doctorDisapprove'])->name('admin.doctor.disapproval');

    // Appointment routes
    Route::get('appointments', [AdminController::class, 'getAppointment'])->name('admin.appointments');
    Route::get('appointment/edit/{id}', [AdminController::class, 'editAppointment'])->name('admin.update.appointment');
    Route::post('appointment/edit/{id}', [AdminController::class, 'updateAppointment'])->name('admin.edit.appointment');
    Route::get('appointment/delete/{id}', [AdminController::class, 'deleteAppointment'])->name('admin.delete.appointment');
    Route::get('future-appointments', [AdminController::class, 'futureAppointments'])->name('admin.future.appointment');
    Route::get('past-appointments', [AdminController::class, 'pastAppointments'])->name('admin.past.appointment');

    // Health Records
    Route::get('health-records', [AdminController::class, 'patient_hr_index'])->name('admin.health-records');
    Route::get('health-record/edit/{id}', [AdminController::class, 'patient_hr_edit'])->name('admin.health-record.edit');
    Route::post('health-records/update/{user_id}', [AdminController::class, 'patient_hr_update'])->name('admin.health-record.update');

    // Feedbacks
    Route::get('feedbacks', [AdminController::class, 'feedbacks'])->name('admin.feedbacks');
    Route::post('feedbacks/approve', [AdminController::class, 'feedbackApprrove'])->name('admin.approve.feedback');
    Route::post('feedbacks/disapprove', [AdminController::class, 'feedbackDisapprrove'])->name('admin.disapprove.feedback');

    // Blogs
    Route::resource('blogs', BlogController::class);
});

Route::group(['prefix' => 'doctor', 'middleware' => 'checkDoctor'], function(){
    Route::get('dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
    Route::get('basic-information', [DoctorController::class, 'basic_info']);
    Route::post('profile/update', [DoctorController::class, 'profileUpdate'])->name('doctor.profile.update');
    Route::post('doctor/logout', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    Route::get('patient-health-record', [DoctorController::class, 'patient_hr_index'])->name('health-record.index');
    Route::get('patient-health-record-show/{id}', [DoctorController::class, 'show'])->name('health-record.show');
    // Route::post('patient-health-record', [DoctorController::class, 'store'])->name('health-record.store');

    Route::get('appointments', [DoctorController::class, 'getAppointment'])->name('doctor.appointments');

    // Doctor Feedback
    Route::get('feedbacks', [DoctorFeedbackController::class, 'index'])->name('doctor.feedbacks');
    Route::get('create-feedback', [DoctorFeedbackController::class, 'create'])->name('doctor.create.feedback');
    Route::post('store-feedback', [DoctorFeedbackController::class, 'store'])->name('doctor.store.feedback');
    Route::get('edit-feedback/{id}', [DoctorFeedbackController::class, 'edit'])->name('doctor.edit.feedback');
    Route::post('update-feedback/{id}', [DoctorFeedbackController::class, 'update'])->name('doctor.update.feedback');

    // Video Consultation Requests
    Route::get('/video-consultation-requests', [DoctorController::class, 'getVideoConsultationRequests'])->name('doctor.consultations');
});

// Doctor Zoom Meeting
Route::post('/authorize', [ZoomController::class, 'authorizeZoom']);
Route::get('/redirect', [ZoomController::class, 'redirect']);

Route::get('hash', function(){
    dd(Hash::make('safi123'));
});

// Catch-all route for 404
Route::fallback(function () {
    $pageTitle = 'Digital Clinic | Not Found';
    return view('errors.404', compact('pageTitle'));
});
