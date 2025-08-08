<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineCoursesController extends Controller
{
    public function index()
    {
        return view('online-courses');
    }
}