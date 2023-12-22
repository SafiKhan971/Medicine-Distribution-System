<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    // protected $guarded = [];
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medicine_name',
        'frequency',
        'dosage',
        'unit',
        'route_of_administration',
        'duration',
        'additional_instructions',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
