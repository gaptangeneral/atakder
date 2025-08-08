<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['title', 'content', 'is_active', 'order'];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
}