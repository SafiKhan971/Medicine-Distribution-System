<?php

namespace App\Providers;

use App\Models\Doctor;
use App\Models\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $id = session('doctor_id');
        dd($id);
        // if(!empty($id))
        // {
        //     dd($id);
        // }
        // dd('id not available');
        // $notification = Notification::where('doctor_id', $id)->get();
        Schema::defaultStringLength(191);
    }
}
