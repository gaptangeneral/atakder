<?php

namespace App\Http\Controllers;

use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first(); // Veritabanından ilk About kaydını çekiyoruz

        return view('about', compact('about'));
    }
}