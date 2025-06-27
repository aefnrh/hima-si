<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Division;
use App\Models\Setting;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $kabinet = Kabinet::latest()->first();
        $divisions = Division::all();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        $latestEvents = Event::orderBy('date', 'desc')->take(3)->get();
        
        return view('pages.home', compact('kabinet', 'divisions', 'settings', 'latestEvents'));
    }
}
