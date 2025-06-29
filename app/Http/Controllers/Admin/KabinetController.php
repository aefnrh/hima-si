<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kabinet;
use Illuminate\Http\Request;

class KabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabinets = Kabinet::orderBy('year', 'desc')->get();
        return view('admin.kabinet.index', compact('kabinets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kabinet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Kabinet::create($validated);

        return redirect()->route('admin.kabinet.index')
            ->with('success', 'Kabinet berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kabinet $kabinet)
    {
        return view('admin.kabinet.edit', compact('kabinet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kabinet $kabinet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($kabinet->image && file_exists(public_path('images/' . $kabinet->image))) {
                unlink(public_path('images/' . $kabinet->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        $kabinet->update($validated);

        return redirect()->route('admin.kabinet.index')
            ->with('success', 'Kabinet berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kabinet $kabinet)
    {
        $divisions = $kabinet->divisions;
        return view('admin.kabinet.show', compact('kabinet', 'divisions'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabinet $kabinet)
    {
        // Delete image if exists
        if ($kabinet->image && file_exists(public_path('images/' . $kabinet->image))) {
            unlink(public_path('images/' . $kabinet->image));
        }

        $kabinet->delete();

        return redirect()->route('admin.kabinet.index')
            ->with('success', 'Kabinet berhasil dihapus.');
    }
}
