<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlineCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OnlineCourseController extends Controller
{
    public function index()
    {
        $onlineCourses = OnlineCourse::orderBy('created_at', 'desc')->get();
        return view('admin.online-courses.index', compact('onlineCourses'));
    }

    public function create()
    {
        return view('admin.online-courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'nullable|string|max:255',
            'has_certificate' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('online-courses', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['has_certificate'] = $request->has('has_certificate');
        $validated['is_active'] = $request->has('is_active');

        OnlineCourse::create($validated);

        return redirect()->route('admin.online-courses.index')->with('success', 'Online kurs bilgileri başarıyla eklendi.');
    }

    public function edit($id)
    {
        $onlineCourse = OnlineCourse::findOrFail($id);
        return view('admin.online-courses.edit', compact('onlineCourse'));
    }

    public function update(Request $request, $id)
    {
        $onlineCourse = OnlineCourse::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'nullable|string|max:255',
            'has_certificate' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($onlineCourse->image) {
                Storage::disk('public')->delete($onlineCourse->image);
            }
            
            $imagePath = $request->file('image')->store('online-courses', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['has_certificate'] = $request->has('has_certificate');
        $validated['is_active'] = $request->has('is_active');

        $onlineCourse->update($validated);

        return redirect()->route('admin.online-courses.index')->with('success', 'Online kurs bilgileri başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $onlineCourse = OnlineCourse::findOrFail($id);
        
        if ($onlineCourse->image) {
            Storage::disk('public')->delete($onlineCourse->image);
        }
        
        $onlineCourse->delete();

        return redirect()->route('admin.online-courses.index')->with('success', 'Online kurs bilgileri başarıyla silindi.');
    }
}