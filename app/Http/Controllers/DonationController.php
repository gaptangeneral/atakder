<?php

namespace App\Http\Controllers;

use App\Models\AccountNumber;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $accountNumbers = AccountNumber::orderBy('order')->get();
        return view('donation', compact('accountNumbers'));
    }
    
    public function store(Request $request)
    {
        // Bağış formu işleme kodları
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'amount' => 'required|numeric|min:1',
            'donation_type' => 'required|string|in:tek_sefer,duzenli',
            'message' => 'nullable|string',
            'agreement' => 'required|accepted',
        ]);
        
        // Burada bağış işlemleri yapılacak
        // Örneğin: PaymentGateway::process($validated);
        
        return redirect()->back()->with('success', 'Bağışınız için teşekkür ederiz!');
    }
}