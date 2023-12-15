<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model {
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [ 'comments', 'user_id', 'doctor_id' ];

    public function doctor() {
        return $this->belongsTo( Doctor::class );
    }

    public function patient() {
        return $this->belongsTo( User::class, 'user_id' );
    }
}
