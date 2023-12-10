<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'doctor_id', 'app_dt_start', 'app_dt_end'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
