<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects.index', compact('projects'));
    }
    
    public function create()
    {
        return view('admin.projects.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'show_on_homepage' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $validated['image_path'] = $imagePath;
        }
        
        Project::create($validated);
        
        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla oluşturuldu.');
    }
    
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }
    
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'show_on_homepage' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image_path) {
                Storage::delete('public/' . $project->image_path);
            }
            
            $imagePath = $request->file('image')->store('projects', 'public');
            $validated['image_path'] = $imagePath;
        }
        
        $project->update($validated);
        
        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla güncellendi.');
    }
    
    public function destroy(Project $project)
    {
        // Delete image
        if ($project->image_path) {
            Storage::delete('public/' . $project->image_path);
        }
        
        $project->delete();
        
        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla silindi.');
    }
}