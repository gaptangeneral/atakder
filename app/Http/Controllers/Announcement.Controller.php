<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        // Controller içinde admin kontrolü yapacağız
    }
    
    public function index()
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        try {
            $announcements = Announcement::orderBy('order', 'asc')->get();
            return view('admin.announcements.index', compact('announcements'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Duyurular yüklenirken bir hata oluştu: ' . $e->getMessage());
        }
    }
    
    public function create()
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.announcements.create');
    }
    
    public function store(Request $request)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'is_active' => 'nullable|boolean',
                'order' => 'nullable|integer',
            ]);
            
            // Sıra belirleme
            $order = $validated['order'] ?? (Announcement::max('order') + 1);
            
            Announcement::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'is_active' => $request->has('is_active') ? true : false,
                'order' => $order,
            ]);
            
            return redirect()->route('admin.announcements.index')
                ->with('success', 'Duyuru başarıyla oluşturuldu.');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Form verilerinde hatalar var.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Duyuru oluşturulurken bir hata oluştu: ' . $e->getMessage())
                ->withInput();
        }
    }
    
    public function edit(Announcement $announcement)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.announcements.edit', compact('announcement'));
    }
    
    public function update(Request $request, Announcement $announcement)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'is_active' => 'nullable|boolean',
                'order' => 'nullable|integer',
            ]);
            
            $announcement->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'is_active' => $request->has('is_active') ? true : false,
                'order' => $validated['order'] ?? $announcement->order,
            ]);
            
            return redirect()->route('admin.announcements.index')
                ->with('success', 'Duyuru başarıyla güncellendi.');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Form verilerinde hatalar var.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Duyuru güncellenirken bir hata oluştu: ' . $e->getMessage())
                ->withInput();
        }
    }
    
    public function destroy(Announcement $announcement)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        try {
            $announcement->delete();
            
            return redirect()->route('admin.announcements.index')
                ->with('success', 'Duyuru başarıyla silindi.');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.announcements.index')
                ->with('error', 'Duyuru silinirken bir hata oluştu: ' . $e->getMessage());
        }
    }
    
    public function updateOrder(Request $request)
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }
        
        try {
            $validated = $request->validate([
                'orders' => 'required|array',
                'orders.*.id' => 'required|exists:announcements,id',
                'orders.*.order' => 'required|integer|min:0',
            ]);
            
            foreach ($validated['orders'] as $item) {
                Announcement::where('id', $item['id'])->update(['order' => $item['order']]);
            }
            
            return response()->json(['success' => true, 'message' => 'Sıralama başarıyla güncellendi.']);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Sıralama güncellenirken bir hata oluştu.'], 500);
        }
    }
}