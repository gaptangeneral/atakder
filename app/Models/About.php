<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';  // burada çoğul tablo adı

    protected $fillable = [
        'title',
        'content',
        'mission',
        'vision',
        'values',
        'image_path',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'values' => 'array'
    ];
}
