<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return view('donation');
    }
    
    public function store(Request $request)
    {
        // Bağış formu işlemleri burada yapılacak
        return redirect()->back()->with('success', 'Bağışınız için teşekkür ederiz!');
    }
}