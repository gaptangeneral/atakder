<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergency = Emergency::first();
        return view('admin.emergency.index', compact('emergency'));
    }

    public function create()
    {
        return view('admin.emergency.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('emergencies', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');

        Emergency::create($validated);

        return redirect()->route('admin.emergency.index')->with('success', 'Acil durum bilgileri başarıyla eklendi.');
    }

    public function edit($id)
    {
        $emergency = Emergency::findOrFail($id);
        return view('admin.emergency.edit', compact('emergency'));
    }

    public function update(Request $request, $id)
    {
        $emergency = Emergency::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($emergency->image) {
                Storage::disk('public')->delete($emergency->image);
            }
            
            $imagePath = $request->file('image')->store('emergencies', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');

        $emergency->update($validated);

        return redirect()->route('admin.emergency.index')->with('success', 'Acil durum bilgileri başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $emergency = Emergency::findOrFail($id);
        
        if ($emergency->image) {
            Storage::disk('public')->delete($emergency->image);
        }
        
        $emergency->delete();

        return redirect()->route('admin.emergency.index')->with('success', 'Acil durum bilgileri başarıyla silindi.');
    }
}