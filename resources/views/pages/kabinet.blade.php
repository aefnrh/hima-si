@extends('layouts.main')

@php
use Illuminate\Support\Str;
@endphp

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold mb-4">Kabinet HIMA SI Universitas Kuningan</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">Struktur kepengurusan Himpunan Mahasiswa Sistem Informasi Universitas Kuningan periode terkini.</p>
    </div>

    @if ($kabinet)
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
            <div class="md:flex">
                <div class="md:w-1/3">
                    @if ($kabinet->image)
                        <img src="{{ asset('images/' . $kabinet->image) }}" alt="{{ $kabinet->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full min-h-[300px] bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-lg">No Image</span>
                        </div>
                    @endif
                </div>
                <div class="md:w-2/3 p-8">
                    <h2 class="text-2xl font-bold mb-2">{{ $kabinet->name }}</h2>
                    <p class="text-gray-500 mb-6">Periode {{ $kabinet->year }}</p>
                    
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Visi</h3>
                        <p class="text-gray-600">{{ $kabinet->vision }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Misi</h3>
                        <p class="text-gray-600">{{ $kabinet->mission }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-center">Struktur Organisasi</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($divisions as $division)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-4">{{ $division->name }}</h3>
                            
                            @if ($division->description)
                            <div class="mb-4">
                                <p class="text-gray-600">{{ Str::limit($division->description, 150) }}</p>
                            </div>
                            @endif
                            
                            @if(isset($division->work_programs) && is_array($division->work_programs) && count($division->work_programs) > 0)
                            <div class="mb-4">
                                <h4 class="text-lg font-medium mb-2">Program Kerja:</h4>
                                <ul class="list-disc list-inside text-gray-600 space-y-1">
                                    @foreach(array_slice($division->work_programs, 0, 3) as $program)
                                        <li>{{ $program['name'] ?? '' }}</li>
                                    @endforeach
                                    @if(count($division->work_programs) > 3)
                                        <li class="list-none text-blue-600 italic">...dan {{ count($division->work_programs) - 3 }} program lainnya</li>
                                    @endif
                                </ul>
                            </div>
                            @endif
                            
                            <div class="space-y-4 mt-6">
                                <h4 class="text-lg font-medium mb-2">Anggota:</h4>
                                @php
                                    $divisionMembers = $members->where('division_id', $division->id);
                                @endphp
                                
                                @forelse ($divisionMembers as $member)
                                    <div class="flex items-center space-x-4">
                                        @if ($member->image)
                                            <img src="{{ asset('images/' . $member->image) }}" alt="{{ $member->name }}" class="w-12 h-12 rounded-full object-cover">
                                        @else
                                            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                                <span class="text-gray-400 text-xs">No Img</span>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="font-medium">{{ $member->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $member->position }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Belum ada anggota dalam divisi ini.</p>
                                @endforelse
                            </div>
                            
                            <div class="mt-6">
                                <a href="{{ route('divisions.show', $division->slug) }}" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                                    Lihat Detail Divisi
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="text-center py-12 bg-white rounded-lg shadow-md">
            <p class="text-gray-500 text-lg">Informasi kabinet belum tersedia.</p>
        </div>
    @endif
</div>
@endsection