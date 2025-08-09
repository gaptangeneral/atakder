<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Listeleme
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    // Yeni oluşturma formu
    public function create()
    {
        return view('admin.projects.create');
    }

    // Yeni kayıt ekle
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $validated['image'] = $imagePath;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla eklendi.');
    }

    // Düzenleme formu
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    // Güncelleme işlemi
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            
            $imagePath = $request->file('image')->store('projects', 'public');
            $validated['image'] = $imagePath;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla güncellendi.');
    }

    // Silme işlemi
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        // Resmi sil
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla silindi.');
    }
}