@extends('layouts.main')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-12">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <div class="text-center">
                <h1 class="text-9xl font-bold text-indigo-600 dark:text-indigo-500">429</h1>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mt-4">Terlalu Banyak Permintaan</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Maaf, Anda telah mengirim terlalu banyak permintaan. Silakan coba lagi nanti.</p>
                
                <div class="mt-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-700 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
            <p class="text-center text-gray-600 dark:text-gray-400 text-sm">
                © {{ date('Y') }} HIMA SI - Himpunan Mahasiswa Sistem Informasi
            </p>
        </div>
    </div>
</div>
@endsection