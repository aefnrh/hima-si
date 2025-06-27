@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-gradient-to-r from-[#4A5568] to-[#667EEA] py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4">Komunitas HIMA SI</h1>
                <p class="text-xl text-blue-100">Berbagai komunitas yang ada di Himpunan Mahasiswa Sistem Informasi.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
        @forelse ($clubs as $club)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                @if ($club->image)
                    <img src="{{ asset('images/' . $club->image) }}" alt="{{ $club->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Image</span>
                    </div>
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $club->name }}</h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $club->description }}</p>
                    <a href="{{ route('clubs.show', $club->slug) }}" class="inline-block bg-[#667EEA] text-white px-4 py-2 rounded hover:bg-[#5A67D8] transition duration-300">Lihat Detail</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-8">
                <p class="text-gray-500 text-lg">Belum ada komunitas yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection