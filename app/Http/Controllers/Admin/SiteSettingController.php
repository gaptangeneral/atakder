<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }
    
    public function update(Request $request)
    {
        $settings = $request->except('_token');
        
        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }
        
        return redirect()->back()->with('success', 'Ayarlar başarıyla güncellendi.');
    }
}