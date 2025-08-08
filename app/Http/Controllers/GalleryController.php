<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Galeriyi göster
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('gallery');
    }
}