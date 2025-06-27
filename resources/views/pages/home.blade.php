@extends('layouts.main')

@section('content')
<!-- Preloader -->
<div id="preloader" class="fixed inset-0 bg-white dark:bg-gray-900 z-50 flex items-center justify-center transition-opacity duration-500">
    <div class="relative">
        <div class="h-24 w-24 rounded-full border-t-4 border-b-4 border-indigo-600 dark:border-indigo-500 animate-spin"></div>
        <div class="absolute top-0 left-0 h-24 w-24 rounded-full border-t-4 border-b-4 border-indigo-400 dark:border-indigo-300 animate-spin" style="animation-duration: 1.5s;"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <img src="{{ asset('images/LOGO HIMA/LOGO HIMA SI BARU.png') }}" alt="HIMA SI Logo" class="h-12 w-auto animate-pulse dark:filter dark:brightness-110">
        </div>
    </div>
</div>

<script>
    // Preloader Functionality
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');
        preloader.style.opacity = '0';
        setTimeout(function() {
            preloader.style.display = 'none';
        }, 500);
    });
</script>
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-[#4A5568] to-[#667EEA] dark:from-[#1E293B] dark:to-[#4C51BF] overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-30 dark:opacity-40"></div>
    <!-- Animated Background Particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="particles-container">
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
            <div class="particle dark:opacity-70"></div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-28 relative z-10">
        <div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 text-white mb-10 md:mb-0 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">Himpunan Mahasiswa Sistem Informasi</h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-indigo-200 dark:text-indigo-300">Universitas Kuningan</h2>
                <p class="text-lg mb-8 text-gray-100 max-w-xl">Wadah aspirasi dan pengembangan diri mahasiswa Sistem Informasi Universitas Kunigan untuk berinovasi dan berkontribusi.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('aspirations.index') }}" class="bg-white dark:bg-gray-800 text-[#667EEA] dark:text-indigo-400 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 shadow-md dark:shadow-gray-900/30 transform hover:-translate-y-1 hover:shadow-xl">
                        Sampaikan Aspirasi
                    </a>
                    <a href="#about" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-medium hover:bg-white/20 dark:hover:bg-white/10 transition duration-300 transform hover:-translate-y-1">
                        Tentang Kami
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex justify-center animate-fade-in">
                <img src="{{ asset('images/LOGO HIMA/LOGO HIMA SI BARU.png') }}" alt="HIMSI UNIKU" class="w-64 h-64 md:w-80 md:h-80 object-contain drop-shadow-2xl dark:drop-shadow-[0_20px_30px_rgba(79,70,229,0.15)] transform hover:scale-105 transition duration-500">
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="text-white dark:text-gray-900 fill-current">
            <path d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div>

<!-- About Section -->
<div id="about" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 relative inline-block">
                <span class="relative z-10">Tentang HIMA SI UNIKU</span>
                <span class="absolute -bottom-2 left-0 w-full h-1 bg-[#667EEA]"></span>
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto mt-8 text-lg">Himpunan Mahasiswa Sistem Informasi Universitas Kuningan sebagai sarana warga S1 Sistem Informasi untuk berkomunikasi, menampung aspirasi, dan mengembangkan diri bersama.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-[#667EEA] transform hover:-translate-y-2 group">
                <div class="w-20 h-20 bg-[#667EEA]/10 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:bg-[#667EEA]/20 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800 group-hover:text-[#667EEA] transition duration-300">Komunitas</h3>
                <p class="text-gray-600 text-center leading-relaxed">Membangun komunitas yang solid dan inklusif bagi seluruh mahasiswa Sistem Informasi Universitas Kuningan.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-[#667EEA] transform hover:-translate-y-2 group">
                <div class="w-20 h-20 bg-[#667EEA]/10 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:bg-[#667EEA]/20 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800 group-hover:text-[#667EEA] transition duration-300">Pengembangan</h3>
                <p class="text-gray-600 text-center leading-relaxed">Menyediakan wadah pengembangan diri melalui berbagai kegiatan akademik dan non-akademik.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-[#667EEA] transform hover:-translate-y-2 group">
                <div class="w-20 h-20 bg-[#667EEA]/10 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:bg-[#667EEA]/20 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800 group-hover:text-[#667EEA] transition duration-300">Advokasi</h3>
                <p class="text-gray-600 text-center leading-relaxed">Menjadi jembatan aspirasi mahasiswa dengan pihak fakultas dan universitas untuk peningkatan kualitas pendidikan.</p>
            </div>
        </div>
    </div>
</div>

<!-- Kabinet Section -->
@if(isset($kabinet))
<div class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 relative inline-block">
                <span class="relative z-10">Kabinet HIMA SI</span>
                <span class="absolute -bottom-2 left-0 w-full h-1 bg-[#667EEA]"></span>
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto mt-8 text-lg">Struktur kepengurusan Himpunan Mahasiswa Sistem Informasi periode terkini.</p>
        </div>

        <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:shadow-2xl transition duration-300">
            <div class="md:flex">
                <div class="md:w-1/3 relative overflow-hidden group">
                    @if ($kabinet->image)
                    <img src="{{ asset('images/' . $kabinet->image) }}" alt="{{ $kabinet->name }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                    <div class="w-full h-full min-h-[300px] bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Image</span>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                        <div class="p-6 text-white">
                            <h3 class="text-xl font-bold">{{ $kabinet->name }}</h3>
                            <p>Periode {{ $kabinet->year }}</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-2/3 p-8 md:p-10">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div>
                            <h3 class="text-2xl md:text-3xl font-bold mb-2 text-gray-800">{{ $kabinet->name }}</h3>
                            <p class="text-[#667EEA] font-medium">Periode {{ $kabinet->year }}</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#667EEA]/10 text-[#667EEA]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $kabinet->year }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-8 p-6 bg-gray-50 rounded-lg border-l-4 border-[#667EEA]">
                        <h4 class="text-xl font-semibold mb-3 text-gray-700 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Visi
                        </h4>
                        <p class="text-gray-600 leading-relaxed">{{ $kabinet->vision }}</p>
                    </div>

                    <div class="mb-8 p-6 bg-gray-50 rounded-lg border-l-4 border-[#667EEA]">
                        <h4 class="text-xl font-semibold mb-3 text-gray-700 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Misi
                        </h4>
                        <p class="text-gray-600 leading-relaxed">{{ $kabinet->mission }}</p>
                    </div>

                    <a href="{{ route('kabinet.show', $kabinet->id) }}" class="inline-flex items-center bg-[#667EEA] text-white px-6 py-3 rounded-lg font-medium hover:bg-[#5A67D8] transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                        <span>Lihat Detail Kabinet</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Divisions Section -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 relative inline-block">
                <span class="relative z-10">Divisi HIMA SI</span>
                <span class="absolute -bottom-2 left-0 w-full h-1 bg-[#667EEA]"></span>
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto mt-8 text-lg">Himpunan Mahasiswa Sistem Informasi memiliki beberapa divisi yang berperan penting dalam menjalankan program kerja dan kegiatan organisasi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($divisions as $division)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2 group">
                <div class="relative overflow-hidden h-56">
                    @if ($division->image)
                    <img src="{{ asset('images/' . $division->image) }}" alt="{{ $division->name }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Image</span>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                        <div class="p-6 text-white transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                            <h3 class="text-xl font-bold mb-2">{{ $division->name }}</h3>
                            <p class="text-sm text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">Klik untuk melihat detail</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-[#667EEA] transition duration-300">{{ $division->name }}</h3>
                        <span class="bg-[#667EEA]/10 text-[#667EEA] text-xs font-medium px-2.5 py-0.5 rounded-full">Divisi</span>
                    </div>
                    <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">{{ $division->description }}</p>
                    <a href="{{ route('divisions.show', $division->slug) }}" class="inline-flex items-center bg-[#667EEA] text-white px-4 py-2 rounded-lg hover:bg-[#5A67D8] transition duration-300 transform hover:-translate-y-1 hover:shadow-md">
                        <span>Lihat Detail</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 bg-gray-50 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-gray-500 text-lg">Belum ada divisi yang tersedia.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('divisions.index') }}" class="inline-flex items-center border-2 border-[#667EEA] text-[#667EEA] px-6 py-3 rounded-lg font-medium hover:bg-[#667EEA] hover:text-white transition duration-300 transform hover:-translate-y-1 hover:shadow-md">
                <span>Lihat Semua Divisi</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Events Section -->
<div class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 relative inline-block">
                <span class="relative z-10">Acara Terbaru</span>
                <span class="absolute -bottom-2 left-0 w-full h-1 bg-[#667EEA]"></span>
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto mt-8 text-lg">Ikuti berbagai acara menarik yang diselenggarakan oleh Himpunan Mahasiswa Sistem Informasi untuk mengembangkan potensi dan memperluas jaringan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($latestEvents as $event)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2 group">
                <div class="relative overflow-hidden h-56">
                    @if ($event->image)
                    <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Image</span>
                    </div>
                    @endif
                    <div class="absolute top-0 right-0 bg-[#667EEA] text-white px-4 py-2 m-3 rounded-lg text-sm font-bold shadow-md">
                        {{ $event->date->format('d M Y') }}
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                        <div class="p-6 text-white transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                            <h3 class="text-xl font-bold mb-2">{{ $event->title }}</h3>
                            <p class="text-sm text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">Klik untuk detail acara</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-[#667EEA] transition duration-300">{{ $event->title }}</h3>
                        <span class="bg-[#667EEA]/10 text-[#667EEA] text-xs font-medium px-2.5 py-0.5 rounded-full">Event</span>
                    </div>
                    <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">{{ $event->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="flex items-center text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $event->location }}
                        </span>
                        <a href="{{ route('events.show', $event->slug) }}" class="inline-flex items-center text-[#667EEA] hover:text-[#5A67D8] font-medium transition duration-300">
                            <span>Selengkapnya</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 bg-gray-50 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="text-gray-500 text-lg">Belum ada acara yang tersedia.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('events.index') }}" class="inline-flex items-center border-2 border-[#667EEA] text-[#667EEA] px-6 py-3 rounded-lg font-medium hover:bg-[#667EEA] hover:text-white transition duration-300 transform hover:-translate-y-1 hover:shadow-md">
                <span>Lihat Semua Acara</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Aspiration Section -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 relative inline-block">
                <span class="relative z-10">Sampaikan Aspirasi</span>
                <span class="absolute -bottom-2 left-0 w-full h-1 bg-[#667EEA]"></span>
            </h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-3xl mx-auto mt-8 text-lg">Kami mendengarkan aspirasi dan masukan dari mahasiswa Sistem Informasi untuk meningkatkan kualitas program studi dan kegiatan kemahasiswaan.</p>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center gap-12">
            <div class="w-full md:w-1/2 lg:w-2/5 transform transition duration-500 hover:scale-105">
                <img src="{{ asset('images/aspiration.svg') }}" alt="Aspirasi" class="w-full h-auto drop-shadow-xl dark:filter dark:brightness-90">
            </div>
            <div class="w-full md:w-1/2 lg:w-2/5 space-y-8">
                <div class="bg-gray-50 dark:bg-gray-900 p-8 rounded-xl shadow-lg border border-gray-100 dark:border-gray-800 transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white flex items-center">
                        <svg class="h-6 w-6 text-[#667EEA] dark:text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        Mengapa Aspirasi Anda Penting?
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex items-start bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm transition duration-300 hover:shadow-md hover:bg-indigo-50 dark:hover:bg-gray-700">
                            <div class="bg-[#667EEA] dark:bg-indigo-700 rounded-full p-1 mr-3 mt-0.5">
                                <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Membantu meningkatkan kualitas pembelajaran</span>
                        </li>
                        <li class="flex items-start bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm transition duration-300 hover:shadow-md hover:bg-indigo-50 dark:hover:bg-gray-700">
                            <div class="bg-[#667EEA] dark:bg-indigo-700 rounded-full p-1 mr-3 mt-0.5">
                                <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Menyuarakan kebutuhan mahasiswa</span>
                        </li>
                        <li class="flex items-start bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm transition duration-300 hover:shadow-md hover:bg-indigo-50 dark:hover:bg-gray-700">
                            <div class="bg-[#667EEA] dark:bg-indigo-700 rounded-full p-1 mr-3 mt-0.5">
                                <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Mendorong inovasi dalam kegiatan kemahasiswaan</span>
                        </li>
                        <li class="flex items-start bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm transition duration-300 hover:shadow-md hover:bg-indigo-50 dark:hover:bg-gray-700">
                            <div class="bg-[#667EEA] dark:bg-indigo-700 rounded-full p-1 mr-3 mt-0.5">
                                <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Menciptakan lingkungan kampus yang lebih baik</span>
                        </li>
                    </ul>
                </div>
                <div class="text-center md:text-left">
                    <a href="{{ route('aspirations.create') }}" class="inline-flex items-center bg-[#667EEA] dark:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-[#5A67D8] dark:hover:bg-indigo-600 transition duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                        <span>Sampaikan Aspirasi Anda</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 relative inline-block">
                <span class="relative z-10">Apa Kata Mereka</span>
                <span class="absolute -bottom-2 left-0 w-full h-1 bg-[#667EEA]"></span>
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto mt-8 text-lg">Pendapat dan pengalaman dari anggota dan alumni HIMA SI yang telah merasakan manfaat bergabung dengan organisasi kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-[#667EEA]">
                <div class="relative mb-8">
                    <svg class="absolute -top-4 -left-4 h-8 w-8 text-[#667EEA] opacity-50" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                        <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                    </svg>
                    <div class="flex justify-center">
                        <div class="w-20 h-20 bg-[#667EEA]/10 rounded-full flex items-center justify-center ring-4 ring-[#667EEA]/5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-6">
                    <h3 class="text-xl font-semibold">Ahmad Fauzi</h3>
                    <p class="text-[#667EEA] font-medium">Ketua HIMA SI 2022</p>
                </div>
                <p class="text-gray-600 text-center italic leading-relaxed">"HIMA SI memberikan saya kesempatan untuk mengembangkan kemampuan kepemimpinan dan memperluas jaringan profesional. Pengalaman yang sangat berharga."</p>
                <div class="flex justify-center mt-6">
                    <div class="flex text-[#667EEA]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-[#667EEA]">
                <div class="relative mb-8">
                    <svg class="absolute -top-4 -left-4 h-8 w-8 text-[#667EEA] opacity-50" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                        <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                    </svg>
                    <div class="flex justify-center">
                        <div class="w-20 h-20 bg-[#667EEA]/10 rounded-full flex items-center justify-center ring-4 ring-[#667EEA]/5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-6">
                    <h3 class="text-xl font-semibold">Aef Nur Hidayah</h3>
                    <p class="text-[#667EEA] font-medium">Alumni HIMA SI 2023</p>
                </div>
                <p class="text-gray-600 text-center italic leading-relaxed">"Bergabung dengan HIMSI adalah salah satu keputusan terbaik selama kuliah. Saya belajar banyak hal di luar kelas yang sangat bermanfaat untuk karir saya sekarang."</p>
                <div class="flex justify-center mt-6">
                    <div class="flex text-[#667EEA]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-[#667EEA]">
                <div class="relative mb-8">
                    <svg class="absolute -top-4 -left-4 h-8 w-8 text-[#667EEA] opacity-50" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                        <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                    </svg>
                    <div class="flex justify-center">
                        <div class="w-20 h-20 bg-[#667EEA]/10 rounded-full flex items-center justify-center ring-4 ring-[#667EEA]/5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#667EEA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-6">
                    <h3 class="text-xl font-semibold">Budi Santoso</h3>
                    <p class="text-[#667EEA] font-medium">Anggota Divisi Akademik</p>
                </div>
                <p class="text-gray-600 text-center italic leading-relaxed">"HIMA SI memberikan platform untuk mengembangkan soft skill dan hard skill yang tidak didapatkan di kelas. Acara-acara yang diadakan selalu bermanfaat dan menyenangkan."</p>
                <div class="flex justify-center mt-6">
                    <div class="flex text-[#667EEA]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-indigo-600 to-[#667EEA] rounded-2xl shadow-2xl overflow-hidden transform transition duration-500 hover:shadow-3xl">
            <div class="md:flex items-center">
                <div class="md:w-1/2 p-10 md:p-16 text-white">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">Bergabung dengan HIMA SI</h2>
                    <p class="mb-8 text-lg text-indigo-100 leading-relaxed max-w-lg">Jadilah bagian dari Himpunan Mahasiswa Sistem Informasi dan kembangkan potensimu bersama kami melalui berbagai kegiatan dan program yang inspiratif.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center bg-white text-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-indigo-50 transition duration-300 shadow-md transform hover:-translate-y-1 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 p-8 md:p-12 flex items-center justify-center">
                    <img src="{{ asset('images/LOGO HIMA/LOGO HIMA SI BARU.png') }}" alt="Bergabung" class="w-full max-w-lg transform transition duration-500 hover:scale-105 drop-shadow-2xl">
                </div>
            </div>
            <div class="bg-indigo-700 bg-opacity-30 py-4 px-16">
                <div class="flex flex-wrap justify-center md:justify-between items-center gap-6 text-white">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <div class="ml-3">
                            <p class="text-xl font-bold">500+</p>
                            <p class="text-xs text-indigo-200">Anggota Aktif</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <div class="ml-3">
                            <p class="text-xl font-bold">20+</p>
                            <p class="text-xs text-indigo-200">Acara Tahunan</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div class="ml-3">
                            <p class="text-xl font-bold">10+</p>
                            <p class="text-xs text-indigo-200">Program Kerja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Back to Top Button -->
<button id="backToTopBtn" class="fixed bottom-6 right-6 bg-indigo-600 dark:bg-indigo-700 text-white w-12 h-12 rounded-full shadow-lg dark:shadow-indigo-900/30 flex items-center justify-center transform transition-transform duration-300 hover:scale-110 hover:bg-indigo-700 dark:hover:bg-indigo-800 opacity-0 invisible">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
</button>

<script>
    // Back to Top Button Functionality
    const backToTopBtn = document.getElementById('backToTopBtn');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.remove('opacity-0', 'invisible');
            backToTopBtn.classList.add('opacity-100', 'visible');
        } else {
            backToTopBtn.classList.remove('opacity-100', 'visible');
            backToTopBtn.classList.add('opacity-0', 'invisible');
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

@endsection