<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin kullanıcısı oluştur
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@atakder.org.tr',
            'password' => Hash::make('admin123'),
        ]);
    }
}