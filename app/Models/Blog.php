<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Admin;

class Blog extends Model
{
    protected $fillable = ['title', 'content', 'admin_id', 'image', 'slug'];

    // Automatically generate a slug before saving the blog post
    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });
    }

    // Admin Relation
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
