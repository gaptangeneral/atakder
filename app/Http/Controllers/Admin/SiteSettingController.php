<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteSettingController extends Controller
{
    public function __construct()
    {
        // Middleware'i kaldırdık, controller içinde kontrol edeceğiz
    }
    
    public function index()
    {
        // Admin kontrolü
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }
    
    public function update(Request $request)
{
    // Admin kontrolü
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login');
    }
    
    $validated = $request->validate([
        'site_title' => 'required|string|max:255',
        'site_description' => 'nullable|string',
        'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'site_favicon' => 'nullable|image|mimes:ico,png|max:1024',
        'hero_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'hero_title' => 'required|string|max:255',
        'hero_subtitle' => 'required|string|max:255',
        'hero_background' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'contact_email' => 'required|email',
        'contact_phone' => 'required|string|max:20',
        'contact_address' => 'required|string',
        'social_facebook' => 'nullable|url',
        'social_twitter' => 'nullable|url',
        'social_instagram' => 'nullable|url',
        'social_youtube' => 'nullable|url',
    ]);
    
    // Metin alanlarını güncelle
    foreach (['site_title', 'site_description', 'hero_title', 'hero_subtitle', 
             'contact_email', 'contact_phone', 'contact_address',
             'social_facebook', 'social_twitter', 'social_instagram', 'social_youtube'] as $key) {
        SiteSetting::set($key, $validated[$key] ?? '');
    }
    
    // Logo yükleme
    if ($request->hasFile('site_logo')) {
        try {
            // Eski logoyu sil
            $oldLogo = SiteSetting::get('site_logo');
            if ($oldLogo && \Storage::disk('public')->exists($oldLogo)) {
                \Storage::disk('public')->delete($oldLogo);
            }
            
            // Yeni logoyu yükle
            $logoPath = $request->file('site_logo')->store('settings', 'public');
            SiteSetting::set('site_logo', $logoPath);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Logo yüklenirken hata oluştu: ' . $e->getMessage());
        }
    }
    
    // Favicon yükleme
    if ($request->hasFile('site_favicon')) {
        try {
            // Eski favicon'ı sil
            $oldFavicon = SiteSetting::get('site_favicon');
            if ($oldFavicon && \Storage::disk('public')->exists($oldFavicon)) {
                \Storage::disk('public')->delete($oldFavicon);
            }
            
            // Yeni favicon'ı yükle
            $faviconPath = $request->file('site_favicon')->store('settings', 'public');
            SiteSetting::set('site_favicon', $faviconPath);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Favicon yüklenirken hata oluştu: ' . $e->getMessage());
        }
    }
    
    // Hero logo yükleme
    if ($request->hasFile('hero_logo')) {
        try {
            // Eski hero logoyu sil
            $oldHeroLogo = SiteSetting::get('hero_logo');
            if ($oldHeroLogo && \Storage::disk('public')->exists($oldHeroLogo)) {
                \Storage::disk('public')->delete($oldHeroLogo);
            }
            
            // Yeni hero logoyu yükle
            $heroLogoPath = $request->file('hero_logo')->store('settings', 'public');
            SiteSetting::set('hero_logo', $heroLogoPath);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hero logo yüklenirken hata oluştu: ' . $e->getMessage());
        }
    }
    
    // Hero background yükleme
    if ($request->hasFile('hero_background')) {
        try {
            // Eski hero background'ı sil
            $oldHeroBg = SiteSetting::get('hero_background');
            if ($oldHeroBg && \Storage::disk('public')->exists($oldHeroBg)) {
                \Storage::disk('public')->delete($oldHeroBg);
            }
            
            // Yeni hero background'ı yükle
            $heroBgPath = $request->file('hero_background')->store('settings', 'public');
            SiteSetting::set('hero_background', $heroBgPath);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hero background yüklenirken hata oluştu: ' . $e->getMessage());
        }
    }
    
    return redirect()->route('admin.settings.index')
        ->with('success', 'Site ayarları başarıyla güncellendi.');
}
}