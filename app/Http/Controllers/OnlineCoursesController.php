<?php

namespace App\Http\Controllers;

use App\Models\OnlineCourse;

class OnlineCoursesController extends Controller
{
    public function index()
    {
        $onlineCourses = OnlineCourse::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('online-courses', compact('onlineCourses'));
    }
}