<?php
namespace App\Http\Controllers;

use App\Models\AccountNumber;

class AccountNumbersController extends Controller
{
    public function index()
    {
        $accountNumbers = AccountNumber::orderBy('order')->get();
        return view('account-numbers', compact('accountNumbers')); // Düzeltilmiş view adı
    }
}