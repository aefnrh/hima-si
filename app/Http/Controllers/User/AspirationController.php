<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirationController extends Controller
{
    /**
     * Display a listing of the user's aspirations.
     */
    public function index()
    {
        $aspirations = Aspiration::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('user.aspirations.index', compact('aspirations'));
    }
    
    /**
     * Display the specified aspiration.
     */
    public function show(Aspiration $aspiration)
    {
        // Ensure the user can only view their own aspirations
        if ($aspiration->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('user.aspirations.show', compact('aspiration'));
    }
    
    /**
     * Remove the specified aspiration from storage.
     */
    public function destroy(Aspiration $aspiration)
    {
        // Ensure the user can only delete their own aspirations
        if ($aspiration->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $aspiration->delete();
        
        return redirect()->route('user.aspirations.index')
            ->with('success', 'Aspirasi berhasil ditarik kembali.');
    }
}