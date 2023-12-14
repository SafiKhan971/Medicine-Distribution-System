<?php

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchDoctors;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\Auth\GoogleAuthController;
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
    return view('frontend/index', compact('pageTitle'));
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['prefix' => 'profile', 'middleware' => ['checkLogin', 'verified']], function(){
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('basic-information', [ProfileController::class, 'basic_info']);
    Route::get('appointments', [AppointmentController::class, 'index'])->middleware('checkLogin');
    Route::get('appointment', [AppointmentController::class, 'create'])->name('profile.create.appointment');
    Route::post('appointment', [AppointmentController::class, 'store'])->name('profile.create.appointment');
    Route::get('appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('profile.edit.appointment');
    Route::post('appointment/edit/{id}', [AppointmentController::class, 'update'])->name('profile.edit.appointment');
    Route::get('appointment/delete/{id}', [AppointmentController::class, 'destroy'])->name('profile.delete.appointment');
    Route::get('create-health-record', [HealthRecordController::class, 'create'])->name('profile.create.record');
    Route::post('create-health-record', [HealthRecordController::class, 'store'])->name('profile.create.record');

    Route::get('search-for-doctors', [SearchDoctors::class, 'index'])->name('search-doctor.index');
    Route::get('feedbacks', [FeedBackController::class, 'index'])->name('profile.feedbacks');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('admin/login', [AdminController::class, 'login'])->middleware('checkAdminLogin');
Route::post('admin/login', [AdminController::class, 'store']);

Route::get('doctor/login', [DoctorController::class, 'login'])->name('doctor.login');
Route::post('doctor/login', [DoctorController::class, 'store']);

Route::get('doctor/register', [DoctorController::class, 'create']);
Route::post('doctor/register', [DoctorController::class, 'register'])->name('doctor.register');
Route::post('doctor/registration', [DoctorController::class, 'register']);

Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


Route::group(['prefix' => 'admin', 'middleware' => 'checkUser'], function(){
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
    // Route::get('appointment', [AppointmentController::class, 'create'])->name('admin.create.appointment');
    // Route::post('appointment', [AppointmentController::class, 'store'])->name('admin.create.appointment');
    Route::get('appointments', [AdminController::class, 'getAppointment'])->name('admin.appointments');
    Route::get('appointment/edit/{id}', [AdminController::class, 'editAppointment'])->name('admin.edit.appointment');
    Route::post('appointment/edit/{id}', [AdminController::class, 'updateAppointment'])->name('admin.edit.appointment');
    Route::get('appointment/delete/{id}', [AdminController::class, 'deleteAppointment'])->name('admin.delete.appointment');
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
});

Route::get('hash', function(){
    dd(Hash::make('safi123'));
});
