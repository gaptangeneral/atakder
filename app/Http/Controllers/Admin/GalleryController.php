<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        // Controller içinde kontrol edeceğiz
    }
    
    public function index()
{
    // Admin kontrolü
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login');
    }
    
    try {
        $galleries = Gallery::orderBy('order', 'asc')->get();
        
        // Doğrudan gallery view'ini döndür
        return view('admin.gallery.index', compact('galleries'));
    } catch (\Exception $e) {
        return redirect()->route('admin.dashboard')->with('error', 'Galeri yüklenirken bir hata oluştu: ' . $e->getMessage());
    }
}
    public function create()
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.gallery.create');
    }
    
    public function store(Request $request)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_on_homepage' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);
        
        // Resim yükleme
        $imagePath = $request->file('image')->store('gallery', 'public');
        
        // Sıra belirleme
        $order = $validated['order'] ?? Gallery::max('order') + 1;
        
        // Galeriyi oluştur
        $gallery = Gallery::create([
            'title' => $validated['title'],
            'image_path' => $imagePath,
            'is_active' => true,
            'show_on_homepage' => $validated['show_on_homepage'] ?? false,
            'order' => $order,
        ]);
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Galeri resmi başarıyla eklendi.');
    }
    
    public function edit(Gallery $gallery)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.gallery.edit', compact('gallery'));
    }
    
    public function update(Request $request, Gallery $gallery)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_on_homepage' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);
        
        // Resim güncelleme
        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            
            // Yeni resmi yükle
            $imagePath = $request->file('image')->store('gallery', 'public');
            $gallery->image_path = $imagePath;
        }
        
        // Diğer alanları güncelle
        $gallery->title = $validated['title'];
        $gallery->show_on_homepage = $validated['show_on_homepage'] ?? false;
        
        if (isset($validated['order'])) {
            $gallery->order = $validated['order'];
        }
        
        $gallery->save();
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Galeri resmi başarıyla güncellendi.');
    }
    
    public function destroy(Gallery $gallery)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        // Resmi sil
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        
        // Galeriyi sil
        $gallery->delete();
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Galeri resmi başarıyla silindi.');
    }
    
    public function updateOrder(Request $request)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|exists:galleries,id',
            'orders.*.order' => 'required|integer|min:1',
        ]);
        
        foreach ($validated['orders'] as $item) {
            Gallery::where('id', $item['id'])->update(['order' => $item['order']]);
        }
        
        return response()->json(['success' => true, 'message' => 'Sıralama başarıyla güncellendi.']);
    }
}