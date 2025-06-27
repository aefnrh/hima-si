<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aspirations = Aspiration::orderBy('created_at', 'desc')->get();
        return view('admin.aspirations.index', compact('aspirations'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Aspiration $aspiration)
    {
        // Update status to read if it's pending
        if ($aspiration->status === 'pending') {
            $aspiration->update(['status' => 'read']);
        }
        
        return view('admin.aspirations.show', compact('aspiration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspiration $aspiration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,read,responded',
        ]);

        $aspiration->update($validated);

        return redirect()->route('admin.aspirations.index')
            ->with('success', 'Status aspirasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspiration $aspiration)
    {
        $aspiration->delete();

        return redirect()->route('admin.aspirations.index')
            ->with('success', 'Aspirasi berhasil dihapus.');
    }
}
