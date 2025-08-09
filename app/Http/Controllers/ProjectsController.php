<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('projects', compact('projects'));
    }
}