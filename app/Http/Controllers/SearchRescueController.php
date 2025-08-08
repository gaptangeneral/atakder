<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchRescueController extends Controller
{
    public function index()
    {
        return view('search-rescue');
    }
}