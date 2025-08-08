<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('order')->get();
        return view('admin.announcements.index', compact('announcements'));
    }
    
    public function create()
    {
        return view('admin.announcements.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'nullable|integer',
        ]);
        
        Announcement::create($validated);
        
        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru başarıyla oluşturuldu.');
    }
    
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }
    
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'nullable|integer',
        ]);
        
        $announcement->update($validated);
        
        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru başarıyla güncellendi.');
    }
    
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        
        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru başarıyla silindi.');
    }
}