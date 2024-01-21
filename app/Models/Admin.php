<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Blog relation
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'admin_id');
    }
}
