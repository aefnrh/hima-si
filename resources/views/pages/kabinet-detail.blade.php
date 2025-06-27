@extends('layouts.main')

@php
use Illuminate\Support\Str;
@endphp

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <a href="{{ route('kabinet.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Kabinet Terkini
        </a>
    </div>

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
                <h1 class="text-3xl font-bold mb-2">{{ $kabinet->name }}</h1>
                <p class="text-gray-500 mb-6">Periode {{ $kabinet->year }}</p>
                
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-3">Visi</h2>
                    <p class="text-gray-600">{{ $kabinet->vision }}</p>
                </div>
                
                <div>
                    <h2 class="text-xl font-semibold mb-3">Misi</h2>
                    <p class="text-gray-600">{{ $kabinet->mission }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-12">
        <h2 class="text-2xl font-bold mb-8 text-center">Struktur Organisasi</h2>
        
        @foreach ($divisions as $division)
            <div class="mb-10 bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4 pb-2 border-b">{{ $division->name }}</h3>
                    
                    <div class="md:flex">
                        <div class="md:w-1/3 pr-6">
                            @if ($division->image)
                                <img src="{{ asset('images/' . $division->image) }}" alt="{{ $division->name }}" class="w-full h-auto object-cover rounded-lg mb-4">
                            @endif
                            
                            @if ($division->description)
                            <div class="mb-6">
                                <h4 class="text-lg font-medium mb-2">Deskripsi:</h4>
                                <p class="text-gray-600">{{ $division->description }}</p>
                            </div>
                            @endif
                            
                            @if(isset($division->work_programs) && is_array($division->work_programs) && count($division->work_programs) > 0)
                            <div class="mb-6">
                                <h4 class="text-lg font-medium mb-2">Program Kerja:</h4>
                                <div class="space-y-3">
                                    @foreach($division->work_programs as $index => $program)
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <h5 class="font-semibold">{{ $program['name'] ?? '' }}</h5>
                                            @if(isset($program['description']))
                                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($program['description'], 100) }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            
                            <div class="mt-4">
                                <a href="{{ route('divisions.show', $division->slug) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                                    Lihat Detail Lengkap
                                </a>
                            </div>
                        </div>
                        
                        <div class="md:w-2/3 mt-6 md:mt-0">
                            <h4 class="text-lg font-medium mb-4">Anggota Divisi:</h4>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @php
                                    $divisionMembers = $members->where('division_id', $division->id);
                                @endphp
                                
                                @forelse ($divisionMembers as $member)
                                    <div class="bg-white border rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-md hover:-translate-y-1">
                                        <div class="flex items-center p-3">
                                            @if ($member->image)
                                                <img src="{{ asset('images/' . $member->image) }}" alt="{{ $member->name }}" class="w-16 h-16 rounded-full object-cover mr-3">
                                            @else
                                                <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                                    <span class="text-gray-400 text-xs">No Image</span>
                                                </div>
                                            @endif
                                            <div>
                                                <h5 class="font-semibold">{{ $member->name }}</h5>
                                                <p class="text-sm text-gray-600">{{ $member->position }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-3">
                                        <p class="text-gray-500">Belum ada anggota dalam divisi ini.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection