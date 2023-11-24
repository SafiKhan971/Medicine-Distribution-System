<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{

    public function index()
    {
        return view('backend.admin.index');
    }
    public function login()
    {
        return view('backend.admin.login');
    }

    public function store(Request $request){

        $admin = Admin::where('email', $request->email)->first();

        if($admin && Hash::check($request->password, $admin->password))
        {
            request()->session()->put('admin_id', $admin->id);
            flash('Logged In Successfully!')->success();
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        } else {
            
        }
    }
    public function destroy(){
        session()->forget('admin_id');
        flash('Logged In Successfully!')->success();
        return redirect('/');
    }

}
