<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Handle newsletter subscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.unique' => 'Email ini sudah terdaftar dalam newsletter kami.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Save the email to the newsletter subscribers list
        NewsletterSubscriber::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        return redirect()->back()->with('success', 'Terima kasih telah berlangganan newsletter kami!');
    }
    
    /**
     * Display a listing of the newsletter subscribers for users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = NewsletterSubscriber::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.newsletter-subscribers', compact('subscribers'));
    }
}