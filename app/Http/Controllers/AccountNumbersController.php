<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountNumbersController extends Controller
{
    public function index()
    {
        return view('account-numbers');
    }
}