<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'duration',
        'has_certificate',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'has_certificate' => 'boolean',
    ];
}