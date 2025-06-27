@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <a href="{{ route('divisions.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar Divisi
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/3">
                @if ($division->image)
                    <img src="{{ asset('images/' . $division->image) }}" alt="{{ $division->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full min-h-[300px] bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Image</span>
                    </div>
                @endif
            </div>
            <div class="md:w-2/3 p-8">
                <h1 class="text-3xl font-bold mb-4">{{ $division->name }}</h1>
                <div class="prose max-w-none mb-8">
                    <p>{{ $division->description }}</p>
                </div>
                
                @if(isset($division->work_programs) && is_array($division->work_programs) && count($division->work_programs) > 0)
                <div class="mt-6">
                    <h2 class="text-xl font-bold mb-4">Program Kerja</h2>
                    <div class="space-y-4">
                        @foreach($division->work_programs as $program)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-lg font-semibold mb-2">{{ $program['name'] ?? '' }}</h3>
                                
                                @if(isset($program['time']))
                                <div class="mb-2">
                                    <span class="font-medium">Waktu Pelaksanaan:</span> {{ $program['time'] }}
                                </div>
                                @endif
                                
                                @if(isset($program['description']))
                                <div class="mb-2">
                                    <span class="font-medium">Gambaran Umum:</span>
                                    <p>{{ $program['description'] }}</p>
                                </div>
                                @endif
                                
                                @if(isset($program['target']))
                                <div class="mb-2">
                                    <span class="font-medium">Sasaran:</span> {{ $program['target'] }}
                                </div>
                                @endif
                                
                                @if(isset($program['goals']))
                                <div class="mb-2">
                                    <span class="font-medium">Tujuan:</span> {{ $program['goals'] }}
                                </div>
                                @endif
                                
                                @if(isset($program['budget']))
                                <div class="mb-2">
                                    <span class="font-medium">Anggaran:</span> {{ $program['budget'] }}
                                </div>
                                @endif
                                
                                @if(isset($program['leader']))
                                <div class="mb-2">
                                    <span class="font-medium">Ketua Pelaksana:</span> {{ $program['leader'] }}
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center">Anggota Divisi</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($members as $member)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    @if ($member->image)
                        <img src="{{ asset('images/' . $member->image) }}" alt="{{ $member->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-lg">No Image</span>
                        </div>
                    @endif
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold">{{ $member->name }}</h3>
                        <p class="text-gray-600">{{ $member->position }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-8">
                    <p class="text-gray-500 text-lg">Belum ada anggota dalam divisi ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection