<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Member;
use App\Models\Setting;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the divisions.
     */
    public function index()
    {
        $latestKabinet = \App\Models\Kabinet::latest()->first();
        $divisions = $latestKabinet ? Division::where('kabinet_id', $latestKabinet->id)->get() : collect();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        
        return view('pages.divisions', compact('divisions', 'latestKabinet', 'settings'));
    }

    /**
     * Display the specified division.
     */
    public function show($slug)
    {
        $division = Division::where('slug', $slug)->firstOrFail();
        $members = Member::where('division_id', $division->id)
            ->when($division->kabinet_id, function($query, $kabinetId) {
                return $query->where('kabinet_id', $kabinetId);
            })
            ->get();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        
        return view('pages.division-detail', compact('division', 'members', 'settings'));
    }
}
