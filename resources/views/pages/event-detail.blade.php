@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <a href="{{ route('events.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar Acara
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2">
                @if ($event->image)
                    <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full min-h-[300px] bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Image</span>
                    </div>
                @endif
            </div>
            <div class="md:w-1/2 p-8">
                <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>
                
                @if ($event->date >= now())
                    <div class="inline-block bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium mb-4">
                        Coming Soon
                    </div>
                @else
                    <div class="inline-block bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-medium mb-4">
                        Sudah Dilaksanakan
                    </div>
                @endif
                
                <div class="flex items-center mb-3 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>
                        {{ $event->date->format('d F Y, H:i') }} WIB
                        @if ($event->end_date)
                            - {{ $event->end_date->format('d F Y, H:i') }} WIB
                        @endif
                    </span>
                </div>
                
                <div class="flex items-center mb-3 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $event->location }}</span>
                </div>
                
                @if ($event->division)
                <div class="flex items-center mb-6 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Divisi: <a href="{{ route('events.division', $event->division->slug) }}" class="text-blue-600 hover:text-blue-800">{{ $event->division->name }}</a></span>
                </div>
                @endif
                
                <div class="prose max-w-none">
                    <p>{{ $event->description }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Acara Lainnya</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach (\App\Models\Event::where('id', '!=', $event->id)->latest('date')->take(3)->get() as $otherEvent)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 relative">
                    @if ($otherEvent->image)
                        <img src="{{ asset('images/' . $otherEvent->image) }}" alt="{{ $otherEvent->title }}" class="w-full h-40 object-cover {{ $otherEvent->date < now() ? 'opacity-80' : '' }}">
                    @else
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-lg">No Image</span>
                        </div>
                    @endif
                    @if ($otherEvent->date >= now())
                        <div class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 m-2 rounded-full text-xs font-medium">
                            Coming Soon
                        </div>
                    @endif
                    <div class="p-4">
                        <div class="text-sm text-gray-500 mb-2">{{ $otherEvent->date->format('d F Y') }}</div>
                        <h3 class="text-lg font-semibold mb-2">{{ $otherEvent->title }}</h3>
                        <a href="{{ route('events.show', $otherEvent->slug) }}" class="text-blue-600 hover:text-blue-800">Lihat Detail →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection