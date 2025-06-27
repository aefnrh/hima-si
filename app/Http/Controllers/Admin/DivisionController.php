<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kabinetId = $request->query('kabinet_id');
        
        $divisions = $kabinetId 
            ? Division::where('kabinet_id', $kabinetId)->get()
            : Division::all();
            
        $kabinet = $kabinetId ? \App\Models\Kabinet::find($kabinetId) : null;
        
        return view('admin.divisions.index', compact('divisions', 'kabinet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kabinetId = $request->query('kabinet_id');
        $kabinets = \App\Models\Kabinet::all();
        $selectedKabinet = $kabinetId ? \App\Models\Kabinet::find($kabinetId) : null;
        
        return view('admin.divisions.create', compact('kabinets', 'selectedKabinet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kabinet_id' => 'nullable|exists:kabinet,id',
        ]);

        // Gunakan nama sebagai slug tanpa modifikasi
        $validated['slug'] = $validated['name'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        $division = Division::create($validated);

        if ($request->has('kabinet_id') && $request->kabinet_id) {
            return redirect()->route('admin.kabinet.show', $request->kabinet_id)
                ->with('success', 'Divisi berhasil ditambahkan.');
        }

        return redirect()->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Division $division)
    {
        $kabinets = \App\Models\Kabinet::all();
        $fromKabinet = $request->query('from_kabinet') ? true : false;
        return view('admin.divisions.edit', compact('division', 'kabinets', 'fromKabinet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kabinet_id' => 'nullable|exists:kabinet,id',
        ]);

        // Gunakan nama sebagai slug tanpa modifikasi
        $validated['slug'] = $validated['name'];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($division->image && file_exists(public_path('images/' . $division->image))) {
                unlink(public_path('images/' . $division->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        $division->update($validated);

        if ($request->has('kabinet_id') && $request->kabinet_id) {
            return redirect()->route('admin.kabinet.show', $request->kabinet_id)
                ->with('success', 'Divisi berhasil diperbarui.');
        }

        return redirect()->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Division $division)
    {
        // Store kabinet_id before deleting the division
        $kabinetId = $division->kabinet_id;
        $fromKabinet = $request->query('from_kabinet') ? true : false;
        
        // Delete image if exists
        if ($division->image && file_exists(public_path('images/' . $division->image))) {
            unlink(public_path('images/' . $division->image));
        }

        $division->delete();

        if ($fromKabinet && $kabinetId) {
            return redirect()->route('admin.kabinet.show', $kabinetId)
                ->with('success', 'Divisi berhasil dihapus.');
        }

        return redirect()->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil dihapus.');
    }
}
