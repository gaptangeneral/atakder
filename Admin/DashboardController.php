<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Constructor'daki middleware'i kaldırıyoruz
    }
    
    public function index()
    {
        // Debug kodunu kaldırıp normal kontrolü yapıyoruz
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.dashboard');
    }
}