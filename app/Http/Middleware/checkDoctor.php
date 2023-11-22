<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = session()->get('doctor_id');
            if(isset($id))
            {
                $doctor = Doctor::where('id', $id)->first(['id']);
                if(!$doctor)
                {
                return redirect('/');
                }
            }
            else
            {
                return redirect('/');
            }
        return $next($request);
    }
}
