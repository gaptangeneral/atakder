<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'image_path', 'is_active', 'order'];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
}