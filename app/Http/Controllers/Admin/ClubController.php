<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();
        return view('admin.clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $club = new Club();
        $club->name = $request->name;
        $club->slug = Str::slug($request->name);
        $club->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $club->image = $imageName;
        }

        $club->save();

        return redirect()->route('admin.clubs.index')->with('success', 'Klub berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return view('admin.clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $club->name = $request->name;
        $club->slug = Str::slug($request->name);
        $club->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($club->image) {
                $oldImagePath = public_path('images/' . $club->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $club->image = $imageName;
        }

        $club->save();

        return redirect()->route('admin.clubs.index')->with('success', 'Klub berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        // Delete image if exists
        if ($club->image) {
            $imagePath = public_path('images/' . $club->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $club->delete();

        return redirect()->route('admin.clubs.index')->with('success', 'Klub berhasil dihapus.');
    }
}