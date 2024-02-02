<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           $id = session()->get('admin_id');
            if(isset($id))
            {
                $user = Admin::where('id', $id)->first(['id']);
                if(!$user)
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

