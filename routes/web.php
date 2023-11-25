<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleAuthController;


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
    return view('frontend/index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('appointment', [AppointmentController::class, 'create'])->name('create.appointment');
Route::post('appointment', [AppointmentController::class, 'store'])->name('create.appointment');

Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'store']);

Route::get('doctor/login', [DoctorController::class, 'login']);
Route::post('doctor/login', [DoctorController::class, 'store']);

Route::get('doctor/register', [DoctorController::class, 'create']);
Route::post('doctor/register', [DoctorController::class, 'register']);

Route::get('admin/logout', [AdminController::class, 'destroy']);


Route::group(['prefix' => 'admin', 'middleware' => 'checkUser'], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::group(['prefix' => 'doctor', 'middleware' => 'checkDoctor'], function(){
    Route::get('dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
});
