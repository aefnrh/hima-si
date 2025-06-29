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
        $aspirations = Aspiration::orderBy('created_at', 'desc')->paginate(10);
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
            'response' => 'nullable|string',
            'is_visible' => 'nullable|boolean',
        ]);

        // Jika ada response dan status belum responded, update status menjadi responded
        if (!empty($validated['response']) && $aspiration->status !== 'responded') {
            $validated['status'] = 'responded';
        }

        // Konversi checkbox is_visible
        $validated['is_visible'] = isset($request->is_visible) ? true : false;

        $aspiration->update($validated);

        return redirect()->route('admin.aspirations.show', $aspiration)
            ->with('success', 'Aspirasi berhasil diperbarui.');
    }

    /**
     * Toggle visibility of the aspiration.
     */
    public function toggleVisibility(Aspiration $aspiration)
    {
        $aspiration->update([
            'is_visible' => !$aspiration->is_visible
        ]);

        return redirect()->back()
            ->with('success', 'Visibilitas aspirasi berhasil diubah.');
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
