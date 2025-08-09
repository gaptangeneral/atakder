<?php

namespace App\Http\Controllers;

use App\Models\SearchRescue;

class SearchRescueController extends Controller
{
    public function index()
    {
        $searchRescue = SearchRescue::where('is_active', true)->first();
        return view('search-rescue', compact('searchRescue'));
    }
}