<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    public function doctor() {
        return $this->belongsTo( Doctor::class, 'doctor_id' );
    }

    public function patient() {
        return $this->belongsTo( User::class, 'user_id' );
    }
}
