<?php

namespace App\Console;

use App\Models\Appointment;
use Illuminate\Console\Scheduling\Schedule;
use App\Notifications\AppointmentNotification;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule): void
    // {
    //     // $schedule->command('inspire')->hourly();
    //     $schedule->call(function () {
    //         $upcomingAppointments = Appointment::where('app_dt_start', '>', now())
    //             ->orderBy('app_dt_start')
    //             ->get();

    //         foreach ($upcomingAppointments as $appointment) {
    //             $doctor = $appointment->doctor;
    //             $doctor->notify(new AppointmentNotification($appointment));
    //         }
    //     })->dailyAt('08:00'); // Adjust the time as per your requirement
    // }

    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $upcomingAppointments = Appointment::where('app_dt_start', '>', now())
                ->orderBy('app_dt_start')
                ->get();

            foreach ($upcomingAppointments as $appointment) {
                $doctor = $appointment->doctor;
                $doctor->notify(new AppointmentNotification($appointment));
            }
        })->everySecond(); // Run every second for testing
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
