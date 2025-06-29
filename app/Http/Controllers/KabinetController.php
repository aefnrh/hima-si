<?php

namespace App\Http\Controllers;


use App\Models\Kabinet;
use App\Models\Member;
use App\Models\Division;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class KabinetController extends Controller
{
    /**
     * Display the cabinet information.
     */
    // List all kabinet
    public function index()
    {
        $kabinets = Kabinet::orderBy('year', 'desc')->get();
        return view('pages.kabinet', compact('kabinets'));
    }


    /**
     * Display the specified cabinet.
     */
    // Show detail kabinet
    public function show($id)
    {
        $kabinet = Kabinet::findOrFail($id);
        $divisions = Division::where('kabinet_id', $kabinet->id)->get();
        $members = Member::where('kabinet_id', $kabinet->id)->orderBy('division_id')->get();
        return view('pages.kabinet-detail', compact('kabinet', 'divisions', 'members'));
    }

    // Tampilkan form tambah kabinet
    public function create()
    {
        return view('admin.kabinet.create');
    }

    // Simpan kabinet baru
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
        $validated['slug'] = Str::slug($validated['name']);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }
        Kabinet::create($validated);
        return redirect()->route('kabinet.index')->with('success', 'Kabinet berhasil ditambahkan.');
    }

    // Tampilkan form edit kabinet
    public function edit($id)
    {
        $kabinet = Kabinet::findOrFail($id);
        return view('pages.kabinet-edit', compact('kabinet'));
    }

    // Update kabinet
    public function update(Request $request, $id)
    {
        $kabinet = Kabinet::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($kabinet->image && file_exists(public_path('images/' . $kabinet->image))) {
                unlink(public_path('images/' . $kabinet->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }
        $kabinet->update($validated);
        return redirect()->route('kabinet.index')->with('success', 'Kabinet berhasil diupdate.');
    }

    // Hapus kabinet
    public function destroy($id)
    {
        $kabinet = Kabinet::findOrFail($id);
        if ($kabinet->image && file_exists(public_path('images/' . $kabinet->image))) {
            unlink(public_path('images/' . $kabinet->image));
        }
        $kabinet->delete();
        return redirect()->route('kabinet.index')->with('success', 'Kabinet berhasil dihapus.');
    }

  
    
}