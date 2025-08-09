<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Frontend için içerik gösterme metodu
    public function index()
    {
        $about = About::first();
        return view('about.index', compact('about'));  // frontend blade burada, adminden ayrı
    }

    // Admin paneli için düzenleme sayfası
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    // Admin paneli için güncelleme işlemi
    public function update(Request $request)
    {
        $about = About::first();

        $request->validate([
            'content' => 'required|string',
            // diğer alanlar
        ]);

        $about->update($request->all());

        return redirect()->route('admin.about.edit')->with('success', 'Hakkımızda bilgileri güncellendi.');
    }
}
