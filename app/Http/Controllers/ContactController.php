<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        $settings = Setting::pluck('setting_value', 'setting_key')->toArray();
        return view('pages.contact', compact('settings'));
    }

    /**
     * Handle contact form submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        // In a real application, you would send an email here
        // Mail::to(getSetting('email'))->send(new ContactMail($request->all()));

        return redirect()->route('contact.index')->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}
