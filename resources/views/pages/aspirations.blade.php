@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-gradient-to-r from-[#4A5568] to-[#667EEA] py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4">Kritik & Saran</h1>
                <p class="text-xl text-blue-100">Sampaikan aspirasi, kritik, dan saran Anda untuk kemajuan Himpunan Mahasiswa Sistem Informasi.</p>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('aspirations.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('subject') border-red-500 @enderror" required>
                @error('subject')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                <textarea name="message" id="message" rows="6" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="w-full bg-[#667EEA] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#5A67D8] transition duration-300">
                    Kirim Aspirasi
                </button>
            </div>
        </form>
    </div>

    <div class="mt-16 text-center">
        <h2 class="text-2xl font-bold mb-4">Terima Kasih atas Partisipasi Anda</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Setiap aspirasi, kritik, dan saran yang Anda berikan sangat berharga bagi kami untuk terus meningkatkan kualitas organisasi dan kegiatan HIMA SI.</p>
    </div>
</div>
@endsection