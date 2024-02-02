<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Doctor;

class CheckDoctorLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $doctorId = session()->get('doctor_id');
        if (isset($doctorId)) {
            $doctor = Doctor::where('id', $doctorId)->first(['id']);
            if ($doctor) {
                // Redirect authenticated doctors away from the login page
                return redirect('/doctor/dashboard'); // Change this to the appropriate dashboard or home page for doctors
            }
        }

        return $next($request);
    }
}
