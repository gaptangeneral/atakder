<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SearchRescue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchRescueController extends Controller
{
    public function index()
    {
        $searchRescue = SearchRescue::first();
        return view('admin.search-rescue.index', compact('searchRescue'));
    }

    public function create()
    {
        return view('admin.search-rescue.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('search-rescue', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');

        SearchRescue::create($validated);

        return redirect()->route('admin.search-rescue.index')->with('success', 'Arama ve kurtarma bilgileri başarıyla eklendi.');
    }

    public function edit($id)
    {
        $searchRescue = SearchRescue::findOrFail($id);
        return view('admin.search-rescue.edit', compact('searchRescue'));
    }

    public function update(Request $request, $id)
    {
        $searchRescue = SearchRescue::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($searchRescue->image) {
                Storage::disk('public')->delete($searchRescue->image);
            }
            
            $imagePath = $request->file('image')->store('search-rescue', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');

        $searchRescue->update($validated);

        return redirect()->route('admin.search-rescue.index')->with('success', 'Arama ve kurtarma bilgileri başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $searchRescue = SearchRescue::findOrFail($id);
        
        if ($searchRescue->image) {
            Storage::disk('public')->delete($searchRescue->image);
        }
        
        $searchRescue->delete();

        return redirect()->route('admin.search-rescue.index')->with('success', 'Arama ve kurtarma bilgileri başarıyla silindi.');
    }
}