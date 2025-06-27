@extends('layouts.main')

@section('content')
<div class="bg-gradient-to-r from-[#4A5568] to-[#667EEA] py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4">Acara HIMA SI</h1>
                <p class="text-xl text-blue-100">Berbagai kegiatan dan acara yang diselenggarakan oleh Himpunan Mahasiswa Sistem Informasi.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- Filter Divisi -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold mb-3">Filter Acara Berdasarkan Divisi:</h3>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('events.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm hover:bg-blue-700 transition duration-300">
                    Semua Acara
                </a>
                @foreach($divisions as $division)
                    <a href="{{ route('events.division', $division->slug) }}" 
                       class="px-4 py-2 bg-gray-200 rounded-full text-sm hover:bg-gray-300 transition duration-300">
                        {{ $division->name }}
                    </a>
                @endforeach
            </div>
        </div>
        
        <!-- Acara yang akan datang (Coming Soon) -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b-2 border-[#667EEA]">Acara Mendatang</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($upcomingEvents as $event)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 relative">
                        @if ($event->image)
                            <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-lg">No Image</span>
                            </div>
                        @endif
                        <div class="absolute top-0 right-0 bg-green-500 text-white px-3 py-1 m-2 rounded-full text-sm font-medium">
                            Coming Soon
                        </div>
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
                            <div class="flex items-center mb-2 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $event->location }}
                            </div>
                            @if ($event->division)
                            <div class="flex items-center mb-4 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <a href="{{ route('events.division', $event->division->slug) }}" class="hover:text-blue-600">{{ $event->division->name }}</a>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $event->description }}</p>
                            <a href="{{ route('events.show', $event->slug) }}" class="inline-block bg-[#667EEA] text-white px-4 py-2 rounded hover:bg-[#5A67D8] transition duration-300">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500 text-lg">Belum ada acara mendatang yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Acara yang sudah dilakukan -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b-2 border-[#667EEA]">Acara Sebelumnya</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($pastEvents as $event)
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
                            <div class="flex items-center mb-2 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $event->location }}
                            </div>
                            @if ($event->division)
                            <div class="flex items-center mb-4 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <a href="{{ route('events.division', $event->division->slug) }}" class="hover:text-blue-600">{{ $event->division->name }}</a>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $event->description }}</p>
                            <a href="{{ route('events.show', $event->slug) }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500 text-lg">Belum ada acara sebelumnya yang tersedia.</p>
                    </div>
                @endforelse
            </div>
            
            @if($totalPastEvents > 3)
            <div class="mt-8 text-center">
                <a href="{{ route('events.all') }}" class="inline-flex items-center justify-center bg-[#667EEA] text-white px-6 py-3 rounded-lg hover:bg-[#5A67D8] transition duration-300">
                    <span>Lihat Semua Acara Sebelumnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection