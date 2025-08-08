<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    
    public function send(Request $request)
    {
        // Form işlemleri burada yapılacak
        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi!');
    }
}