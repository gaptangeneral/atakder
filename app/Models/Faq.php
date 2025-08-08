<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'is_active', 'order'];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
}