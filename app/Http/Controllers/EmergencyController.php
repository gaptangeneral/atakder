<?php

namespace App\Http\Controllers;

use App\Models\Emergency;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergency = Emergency::where('is_active', true)->first();
        return view('emergency', compact('emergency'));
    }
}