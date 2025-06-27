<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Setting;
use App\Models\Division;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        // Query untuk acara yang sudah lewat
        $pastEventsQuery = Event::where(function($query) {
                $query->where('date', '<', now())
                      ->whereNull('end_date');
            })->orWhere(function($query) {
                $query->whereNotNull('end_date')
                      ->where('end_date', '<', now());
            })
            ->orderBy('date', 'desc');
            
        // Hitung total acara yang sudah lewat
        $totalPastEvents = $pastEventsQuery->count();
        
        // Ambil 3 acara terbaru yang sudah lewat
        $pastEvents = $pastEventsQuery->take(3)->get();
            
        $upcomingEvents = Event::where(function($query) {
                $query->where('date', '>=', now())
                      ->whereNull('end_date');
            })->orWhere(function($query) {
                $query->whereNotNull('end_date')
                      ->where('end_date', '>=', now());
            })
            ->orderBy('date', 'asc')
            ->take(10)
            ->get();
            
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        $divisions = Division::all();
        
        return view('pages.events', compact('pastEvents', 'upcomingEvents', 'settings', 'divisions', 'totalPastEvents'));
    }

    /**
     * Display all past events.
     */
    public function allPastEvents()
    {
        $pastEvents = Event::where(function($query) {
                $query->where('date', '<', now())
                      ->whereNull('end_date');
            })->orWhere(function($query) {
                $query->whereNotNull('end_date')
                      ->where('end_date', '<', now());
            })
            ->orderBy('date', 'desc')
            ->get();
            
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        $divisions = Division::all();
        
        return view('pages.all-events', compact('pastEvents', 'settings', 'divisions'));
    }

    /**
     * Display the specified event.
     */
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        $divisions = Division::all();
        
        return view('pages.event-detail', compact('event', 'settings', 'divisions'));
    }
    
    /**
     * Display events by division.
     */
    public function eventsByDivision($divisionSlug)
    {
        $division = Division::where('slug', $divisionSlug)->firstOrFail();
        
        $events = Event::where('division_id', $division->id)
            ->orderBy('date', 'desc')
            ->take(10)
            ->get();
            
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        $divisions = Division::all();
        
        // Get total count of events for this division
        $totalEvents = Event::where('division_id', $division->id)->count();
        
        return view('pages.division-events', compact('events', 'division', 'settings', 'divisions', 'totalEvents'));
    }
    
    /**
     * Display all events by division.
     */
    public function allEventsByDivision($divisionSlug)
    {
        $division = Division::where('slug', $divisionSlug)->firstOrFail();
        
        $events = Event::where('division_id', $division->id)
            ->orderBy('date', 'desc')
            ->get();
            
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        $divisions = Division::all();
        
        return view('pages.division-all-events', compact('events', 'division', 'settings', 'divisions'));
    }
}
