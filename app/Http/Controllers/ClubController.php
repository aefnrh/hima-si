<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Setting;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the clubs.
     */
    public function index()
    {
        $clubs = Club::all();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        
        return view('pages.clubs', compact('clubs', 'settings'));
    }

    /**
     * Display the specified club.
     */
    public function show($slug)
    {
        $club = Club::where('slug', $slug)->firstOrFail();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        
        return view('pages.club-detail', compact('club', 'settings'));
    }
}