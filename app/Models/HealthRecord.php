<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthRecord extends Model
{
    use HasFactory;
    protected $guarded;

    public function patient()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
