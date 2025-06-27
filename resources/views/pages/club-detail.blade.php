@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <a href="{{ route('clubs.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar Komunitas
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2">
                @if ($club->image)
                    <img src="{{ asset('images/' . $club->image) }}" alt="{{ $club->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full min-h-[300px] bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Image</span>
                    </div>
                @endif
            </div>
            <div class="md:w-1/2 p-8">
                <h1 class="text-3xl font-bold mb-4">{{ $club->name }}</h1>
                <div class="prose max-w-none">
                    <p class="text-gray-700">{{ $club->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Kegiatan Komunitas</h2>
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-gray-600">Informasi tentang kegiatan komunitas {{ $club->name }} akan segera hadir.</p>
        </div>
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Bergabung dengan Komunitas</h2>
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-gray-600 mb-4">Tertarik untuk bergabung dengan komunitas {{ $club->name }}? Silakan hubungi kami melalui:</p>
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="text-gray-700">Email: {{ $settings['email'] ?? 'info@himasi.org' }}</span>
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span class="text-gray-700">Telepon: {{ $settings['phone'] ?? '+62 123 4567 890' }}</span>
            </div>
        </div>
    </div>
</div>
@endsection