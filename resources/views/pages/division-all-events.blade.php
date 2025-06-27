@extends('layouts.main')

@section('content')
<div class="bg-gradient-to-r from-[#4A5568] to-[#667EEA] py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Semua Acara Divisi {{ $division->name }}</h1>
            <p class="text-xl text-blue-100">{{ $division->description }}</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('events.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Halaman Acara
        </a>
        <a href="{{ route('events.division', $division->slug) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Kembali ke Acara Terkini
        </a>
    </div>
    
    <!-- Filter Divisi -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold mb-3">Filter Acara Berdasarkan Divisi:</h3>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('events.index') }}" class="px-4 py-2 bg-gray-200 rounded-full text-sm hover:bg-gray-300 transition duration-300">
                Semua Acara
            </a>
            @foreach($divisions as $div)
                <a href="{{ route('events.division', $div->slug) }}" 
                   class="px-4 py-2 rounded-full text-sm transition duration-300 {{ $division->id == $div->id ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
                    {{ $div->name }}
                </a>
            @endforeach
        </div>
    </div>
    
    <!-- Semua Acara Divisi -->
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b-2 border-[#667EEA]">Arsip Acara Divisi {{ $division->name }}</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($events as $event)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    @if ($event->image)
                        <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover opacity-80">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-lg">No Image</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center mb-2 text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>
                                {{ $event->date->format('d M Y') }}
                                @if ($event->end_date)
                                    - {{ $event->end_date->format('d M Y') }}
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center mb-4 text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $event->location }}
                        </div>
                        <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $event->description }}</p>
                        <a href="{{ route('events.show', $event->slug) }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-8">
                    <p class="text-gray-500 text-lg">Belum ada acara untuk divisi ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection