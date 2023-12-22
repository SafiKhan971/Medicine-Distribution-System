<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $guarded = []; 
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
