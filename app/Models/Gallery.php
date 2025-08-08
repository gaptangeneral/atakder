<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'is_active',
        'show_on_homepage',
        'order',
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'show_on_homepage' => 'boolean',
        'order' => 'integer',
    ];
}