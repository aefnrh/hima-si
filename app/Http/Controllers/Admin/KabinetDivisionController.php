<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kabinet;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KabinetDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabinets = Kabinet::orderBy('year', 'desc')->get();
        return view('admin.kabinet-division.index', compact('kabinets'));
    }

    /**
     * Show the form for creating a new kabinet.
     */
    public function createKabinet()
    {
        return view('admin.kabinet-division.create-kabinet');
    }

    /**
     * Store a newly created kabinet in storage.
     */
    public function storeKabinet(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Gunakan nama sebagai slug tanpa modifikasi
        $validated['slug'] = $validated['name'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Kabinet::create($validated);

        return redirect()->route('admin.kabinet-division.index')
            ->with('success', 'Kabinet berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified kabinet.
     */
    public function editKabinet(Kabinet $kabinet)
    {
        return view('admin.kabinet-division.edit-kabinet', compact('kabinet'));
    }

    /**
     * Update the specified kabinet in storage.
     */
    public function updateKabinet(Request $request, Kabinet $kabinet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
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

        return redirect()->route('admin.kabinet-division.index')
            ->with('success', 'Kabinet berhasil diperbarui.');
    }

    /**
     * Remove the specified kabinet from storage.
     */
    public function destroyKabinet(Kabinet $kabinet)
    {
        // Delete image if exists
        if ($kabinet->image && file_exists(public_path('images/' . $kabinet->image))) {
            unlink(public_path('images/' . $kabinet->image));
        }

        $kabinet->delete();

        return redirect()->route('admin.kabinet-division.index')
            ->with('success', 'Kabinet berhasil dihapus.');
    }

    /**
     * Show the form for creating a new division.
     */
    public function createDivision(Request $request)
    {
        $kabinetId = $request->query('kabinet_id');
        $kabinets = Kabinet::all();
        $selectedKabinet = $kabinetId ? Kabinet::find($kabinetId) : null;
        
        return view('admin.kabinet-division.create-division', compact('kabinets', 'selectedKabinet'));
    }

    /**
     * Store a newly created division in storage.
     */
    public function storeDivision(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kabinet_id' => 'required|exists:kabinet,id',
        ]);

        // Gunakan nama sebagai slug tanpa modifikasi
        $validated['slug'] = $validated['name'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Division::create($validated);

        $kabinet = Kabinet::find($validated['kabinet_id']);
        
        return redirect()->route('admin.kabinet-division.kabinet.show', $kabinet)
            ->with('success', 'Divisi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified division.
     */
    public function editDivision(Division $division)
    {
        $kabinets = Kabinet::all();
        return view('admin.kabinet-division.edit-division', compact('division', 'kabinets'));
    }

    /**
     * Update the specified division in storage.
     */
    public function updateDivision(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kabinet_id' => 'required|exists:kabinet,id',
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

        $kabinet = Kabinet::find($validated['kabinet_id']);
        
        return redirect()->route('admin.kabinet-division.kabinet.show', $kabinet)
            ->with('success', 'Divisi berhasil diperbarui.');
    }

    /**
     * Remove the specified division from storage.
     */
    public function destroyDivision(Division $division)
    {
        // Save kabinet before deleting division
        $kabinet = $division->kabinet;
        
        // Delete image if exists
        if ($division->image && file_exists(public_path('images/' . $division->image))) {
            unlink(public_path('images/' . $division->image));
        }

        $division->delete();

        return redirect()->route('admin.kabinet-division.kabinet.show', $kabinet)
            ->with('success', 'Divisi berhasil dihapus.');
    }

    /**
     * Show the details of a kabinet with its divisions.
     */
    public function showKabinet(Kabinet $kabinet)
    {
        $divisions = $kabinet->divisions;
        return view('admin.kabinet-division.show-kabinet', compact('kabinet', 'divisions'));
    }
}