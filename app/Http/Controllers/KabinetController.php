<?php

namespace App\Http\Controllers;

use App\Models\Kabinet;
use App\Models\Member;
use App\Models\Division;
use App\Models\Setting;
use Illuminate\Http\Request;

class KabinetController extends Controller
{
    /**
     * Display the cabinet information.
     */
    public function index()
    {
        $kabinet = Kabinet::latest()->first();
        $divisions = $kabinet ? Division::where('kabinet_id', $kabinet->id)->get() : collect();
        $members = $kabinet ? Member::where('kabinet_id', $kabinet->id)->orderBy('division_id')->get() : collect();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        
        return view('pages.kabinet', compact('kabinet', 'divisions', 'members', 'settings'));
    }

    /**
     * Display the specified cabinet.
     */
    public function show($id)
    {
        $kabinet = Kabinet::findOrFail($id);
        $divisions = Division::where('kabinet_id', $kabinet->id)->get();
        $members = Member::where('kabinet_id', $kabinet->id)
            ->orderBy('division_id')
            ->get();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        
        return view('pages.kabinet-detail', compact('kabinet', 'divisions', 'members', 'settings'));
    }
}