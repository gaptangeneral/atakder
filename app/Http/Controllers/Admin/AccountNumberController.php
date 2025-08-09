<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountNumber;
use Illuminate\Http\Request;

class AccountNumberController extends Controller
{
    // Listeleme
    public function index()
    {
        $accountNumbers = AccountNumber::orderBy('order')->get();
        return view('admin.account_numbers.index', compact('accountNumbers')); // Düzeltilmiş view yolu
    }
    
    // Yeni oluşturma formu
    public function create()
    {
        return view('admin.account_numbers.create'); // Düzeltilmiş view yolu
    }
    
    // Yeni kayıt ekle
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_name'       => 'required|string|max:255',
            'account_holder'  => 'required|string|max:255',
            'iban'            => 'required|string|max:34',
            'order'           => 'required|integer|min:0',
        ]);
        AccountNumber::create($validated);
        return redirect()->route('admin.account-numbers.index')->with('success', 'Hesap numarası başarıyla eklendi.');
    }
    
    // Düzenleme formu
    public function edit($id)
    {
        $accountNumber = AccountNumber::findOrFail($id);
        return view('admin.account_numbers.edit', compact('accountNumber')); // Düzeltilmiş view yolu
    }
    
    // Güncelleme işlemi
    public function update(Request $request, AccountNumber $account_number)
    {
        $validated = $request->validate([
            'bank_name'       => 'required|string|max:255',
            'account_holder'  => 'required|string|max:255',
            'iban'            => 'required|string|max:34',
            'order'           => 'required|integer|min:0',
        ]);
        $account_number->update($validated);
        return redirect()->route('admin.account-numbers.index')->with('success', 'Hesap numarası başarıyla güncellendi.');
    }
    
    // Silme işlemi
    public function destroy(AccountNumber $account_number)
    {
        $account_number->delete();
        return redirect()->route('admin.account-numbers.index')->with('success', 'Hesap numarası başarıyla silindi.');
    }
}