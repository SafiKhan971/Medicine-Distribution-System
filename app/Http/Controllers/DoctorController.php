<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function index()
    {
        return view('frontend.doctor.index');
    }
    public function login() 
    {
        return view('frontend.doctor.login');   
    }

    public function store(Request $request){
        
        $doctor = Doctor::where('email', $request->email)->first();
       
        if($doctor && Hash::check($request->password, $doctor->password))
        {
            request()->session()->put('doctor_id', $doctor->id);
            return redirect('doctor.dashboard');
        }
    }

    public function create() {
        return view('frontend.doctor.register');
    }
    
    public function register(Request $request) {
        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);
        $doctor->save();

        request()->session()->put('doctor_id', $doctor->id);
        return redirect('doctor/dashboard');
    }



    public function destroy(){
        session()->forget('doctor_id');
        echo "Doctor Logged out Successfully";
    }

}
