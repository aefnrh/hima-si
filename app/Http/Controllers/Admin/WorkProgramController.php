<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class WorkProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Division $division)
    {
        return view('admin.work-programs.index', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Division $division)
    {
        return view('admin.work-programs.create', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'target' => 'nullable|string',
            'goals' => 'nullable|string',
            'budget' => 'nullable|string',
            'leader' => 'nullable|string|max:255',
        ]);

        $workPrograms = $division->work_programs ?? [];
        $workPrograms[] = $validated;
        
        $division->update([
            'work_programs' => $workPrograms
        ]);

        return redirect()->route('admin.divisions.work-programs.index', $division)
            ->with('success', 'Program kerja berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division, $index)
    {
        $workProgram = $division->work_programs[$index] ?? null;
        
        if (!$workProgram) {
            return redirect()->route('admin.divisions.work-programs.index', $division)
                ->with('error', 'Program kerja tidak ditemukan.');
        }
        
        return view('admin.work-programs.edit', compact('division', 'workProgram', 'index'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division, $index)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'target' => 'nullable|string',
            'goals' => 'nullable|string',
            'budget' => 'nullable|string',
            'leader' => 'nullable|string|max:255',
        ]);

        $workPrograms = $division->work_programs;
        
        if (!isset($workPrograms[$index])) {
            return redirect()->route('admin.divisions.work-programs.index', $division)
                ->with('error', 'Program kerja tidak ditemukan.');
        }
        
        $workPrograms[$index] = $validated;
        
        $division->update([
            'work_programs' => $workPrograms
        ]);

        return redirect()->route('admin.divisions.work-programs.index', $division)
            ->with('success', 'Program kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division, $index)
    {
        $workPrograms = $division->work_programs;
        
        if (!isset($workPrograms[$index])) {
            return redirect()->route('admin.divisions.work-programs.index', $division)
                ->with('error', 'Program kerja tidak ditemukan.');
        }
        
        array_splice($workPrograms, $index, 1);
        
        $division->update([
            'work_programs' => $workPrograms
        ]);

        return redirect()->route('admin.divisions.work-programs.index', $division)
            ->with('success', 'Program kerja berhasil dihapus.');
    }
}