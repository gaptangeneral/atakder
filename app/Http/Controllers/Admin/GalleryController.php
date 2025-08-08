<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->get();
        return view('admin.gallery.index', compact('galleries'));
    }
    
    public function create()
    {
        return view('admin.gallery.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
            $validated['image_path'] = $imagePath;
        }
        
        Gallery::create($validated);
        
        return redirect()->route('admin.gallery.index')->with('success', 'Görsel başarıyla yüklendi.');
    }
    
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }
    
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path) {
                Storage::delete('public/' . $gallery->image_path);
            }
            
            $imagePath = $request->file('image')->store('gallery', 'public');
            $validated['image_path'] = $imagePath;
        }
        
        $gallery->update($validated);
        
        return redirect()->route('admin.gallery.index')->with('success', 'Görsel başarıyla güncellendi.');
    }
    
    public function destroy(Gallery $gallery)
    {
        // Delete image
        if ($gallery->image_path) {
            Storage::delete('public/' . $gallery->image_path);
        }
        
        $gallery->delete();
        
        return redirect()->route('admin.gallery.index')->with('success', 'Görsel başarıyla silindi.');
    }
}