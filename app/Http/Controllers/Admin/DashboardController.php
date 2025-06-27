<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Event;
use App\Models\Member;
use App\Models\Aspiration;
use App\Models\Kabinet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $counts = [
            'divisions' => Division::count(),
            'members' => Member::count(),
            'events' => Event::count(),
            'aspirations' => Aspiration::count(),
            'pending_aspirations' => Aspiration::where('status', 'pending')->count(),
        ];

        $recent_aspirations = Aspiration::orderBy('created_at', 'desc')->take(5)->get();
        $upcoming_events = Event::where('date', '>=', now())->orderBy('date', 'asc')->take(5)->get();

        return view('admin.dashboard', compact('counts', 'recent_aspirations', 'upcoming_events'));
    }
}
