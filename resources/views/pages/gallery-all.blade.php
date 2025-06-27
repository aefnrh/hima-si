@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 overflow-hidden bg-gradient-to-br from-indigo-600 to-purple-600 dark:from-indigo-900 dark:to-purple-900">
    <!-- Animated Background Particles -->
    <div class="absolute inset-0 z-0">
        <div id="particles-js" class="absolute inset-0"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                Semua Galeri HIMA SI
            </h1>
            <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                Koleksi lengkap dokumentasi kegiatan dan momen berharga Himpunan Mahasiswa Sistem Informasi Universitas Kuningan.
            </p>
        </div>
    </div>
</section>

<!-- Galeri Section --> 
<section class="py-20 bg-gray-50 dark:bg-gray-900"> 
    <div class="container mx-auto px-4"> 
        <div class="text-center mb-16"> 
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">Semua Kegiatan</h2> 
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Dokumentasi lengkap berbagai kegiatan yang telah kami laksanakan dari tahun ke tahun.</p> 
        </div> 
         
        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <a href="{{ route('gallery.all') }}" class="{{ !request('category') || request('category') == 'all' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700' }} px-6 py-2 rounded-lg hover:bg-indigo-700 hover:text-white transition duration-300">Semua</a>
            
            @foreach($categories as $category)
                <a href="{{ route('gallery.all', ['category' => $category]) }}" class="{{ request('category') == $category ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700' }} px-6 py-2 rounded-lg hover:bg-indigo-700 hover:text-white transition duration-300">{{ $category }}</a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"> 
            @forelse($galleries as $gallery)
            <!-- Gallery Item --> 
            <div class="relative overflow-hidden rounded-xl group"> 
                <img src="{{ asset('images/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110"> 
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6"> 
                    <div> 
                        <h3 class="text-xl font-bold text-white mb-2">{{ $gallery->title }}</h3> 
                        <p class="text-gray-300">{{ $gallery->event_date->format('F Y') }}</p> 
                    </div> 
                </div> 
            </div>
            @empty
            <div class="col-span-4 text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-4 text-xl font-medium text-gray-700 dark:text-gray-300">Belum ada galeri</h3>
                <p class="mt-2 text-gray-500 dark:text-gray-400">Galeri kegiatan akan segera ditambahkan.</p>
            </div>
            @endforelse
        </div> 
         
        <!-- Pagination --> 
        <div class="flex justify-center mt-12"> 
            {{ $galleries->links() }}
        </div>
    </div> 
</section>
@endsection