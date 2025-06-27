@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 overflow-hidden bg-gradient-to-br from-indigo-600 to-purple-600 dark:from-indigo-900 dark:to-purple-900">
    <!-- Animated Background Particles -->
    <div class="absolute inset-0 z-0">
        <div id="particles-js" class="absolute inset-0"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="w-full lg:w-1/2 text-center lg:text-left mb-12 lg:mb-0">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Tentang HIMA SI Universitas Kuningan
                </h1>
                <p class="text-xl text-indigo-100 mb-8 max-w-xl mx-auto lg:mx-0">
                    Himpunan Mahasiswa Sistem Informasi (HIMA SI) adalah organisasi mahasiswa yang berfokus pada pengembangan potensi dan keterampilan mahasiswa di bidang teknologi informasi.
                </p>
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#visi-misi" class="bg-white text-indigo-600 hover:bg-indigo-50 px-8 py-4 rounded-lg font-medium transition duration-300">
                        Visi & Misi
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <img src="{{ asset('images/LOGO HIMA/LOGO HIMA SI BARU.png') }}" alt="Tentang HIMA SI" class="w-full max-w-lg mx-auto rounded-lg shadow-2xl transform hover:scale-105 transition duration-500">
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi Section -->
<section id="visi-misi" class="py-20 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">Visi & Misi</h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Kami berkomitmen untuk menciptakan lingkungan yang mendukung pertumbuhan akademis dan profesional mahasiswa Sistem Informasi.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Visi Card -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl shadow-xl p-8 transform hover:-translate-y-2 transition duration-300">
                <div class="bg-indigo-600 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto md:mx-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 text-center md:text-left">Visi</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Menjadi organisasi kemahasiswaan yang unggul dalam mengembangkan potensi mahasiswa Sistem Informasi yang profesional, inovatif, dan berintegritas tinggi, serta mampu berkontribusi dalam pengembangan teknologi informasi di tingkat nasional dan internasional.
                </p>
            </div>
            
            <!-- Misi Card -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl shadow-xl p-8 transform hover:-translate-y-2 transition duration-300">
                <div class="bg-purple-600 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto md:mx-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 text-center md:text-left">Misi</h3>
                <ul class="text-gray-600 dark:text-gray-300 leading-relaxed space-y-3">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Menyelenggarakan kegiatan yang mendukung pengembangan akademik dan soft skill mahasiswa Sistem Informasi.
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Membangun jaringan kerjasama dengan berbagai pihak untuk meningkatkan kualitas dan daya saing mahasiswa.
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Mengembangkan budaya inovasi dan kreativitas dalam bidang teknologi informasi.
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Menjadi wadah aspirasi mahasiswa Sistem Informasi untuk pengembangan program studi.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- Statistik Section -->
<section class="py-20 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">Pencapaian Kami</h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Beberapa pencapaian yang telah kami raih selama perjalanan HIMA SI.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Statistik Item 1 -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-8 text-center transform hover:-translate-y-2 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">250+</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Anggota Aktif</div>
            </div>
            
            <!-- Statistik Item 2 -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-8 text-center transform hover:-translate-y-2 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">45+</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Kegiatan Terlaksana</div>
            </div>
            
            <!-- Statistik Item 3 -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-8 text-center transform hover:-translate-y-2 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">20+</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Kerjasama Industri</div>
            </div>
            
            <!-- Statistik Item 4 -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-8 text-center transform hover:-translate-y-2 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">15+</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Penghargaan</div>
            </div>
        </div>
    </div>
</section>

<!-- Galeri Section -->
<section class="py-20 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">Galeri Kegiatan</h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Dokumentasi berbagai kegiatan yang telah kami laksanakan.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Gallery Item 1 -->
            <div class="relative overflow-hidden rounded-xl group">
                <img src="/img/gallery-placeholder-1.jpg" alt="Kegiatan HIMA SI" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Workshop UI/UX Design</h3>
                        <p class="text-gray-300">Mei 2023</p>
                    </div>
                </div>
            </div>
            
            <!-- Gallery Item 2 -->
            <div class="relative overflow-hidden rounded-xl group">
                <img src="/img/gallery-placeholder-2.jpg" alt="Kegiatan HIMA SI" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Seminar Teknologi Blockchain</h3>
                        <p class="text-gray-300">Juli 2023</p>
                    </div>
                </div>
            </div>
            
            <!-- Gallery Item 3 -->
            <div class="relative overflow-hidden rounded-xl group">
                <img src="/img/gallery-placeholder-3.jpg" alt="Kegiatan HIMA SI" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Kompetisi Programming</h3>
                        <p class="text-gray-300">September 2023</p>
                    </div>
                </div>
            </div>
            
            <!-- Gallery Item 4 -->
            <div class="relative overflow-hidden rounded-xl group">
                <img src="/img/gallery-placeholder-4.jpg" alt="Kegiatan HIMA SI" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Kunjungan Industri</h3>
                        <p class="text-gray-300">Oktober 2023</p>
                    </div>
                </div>
            </div>
            
            <!-- Gallery Item 5 -->
            <div class="relative overflow-hidden rounded-xl group">
                <img src="/img/gallery-placeholder-5.jpg" alt="Kegiatan HIMA SI" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Bakti Sosial</h3>
                        <p class="text-gray-300">November 2023</p>
                    </div>
                </div>
            </div>
            
            <!-- Gallery Item 6 -->
            <div class="relative overflow-hidden rounded-xl group">
                <img src="/img/gallery-placeholder-6.jpg" alt="Kegiatan HIMA SI" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Pelantikan Pengurus Baru</h3>
                        <p class="text-gray-300">Desember 2023</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- View More Button -->
        <div class="text-center mt-12">
            <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-8 rounded-lg transition duration-300 inline-flex items-center">
                <span>Lihat Semua Galeri</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-indigo-600 to-purple-600 dark:from-indigo-900 dark:to-purple-900 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 z-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-full h-full text-white">
            <path fill="currentColor" d="M0,0H32V32H0Z"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,0H32V32H0Z"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M4,0V32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M8,0V32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M12,0V32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M16,0V32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M20,0V32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M24,0V32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M28,0V32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,4H32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,8H32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,12H32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,16H32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,20H32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,24H32"/>
            <path fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="1" d="M0,28H32"/>
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Bergabunglah dengan HIMA SI!</h2>
        <p class="text-xl text-indigo-100 mb-10 max-w-3xl mx-auto">Jadilah bagian dari keluarga besar Himpunan Mahasiswa Sistem Informasi dan kembangkan potensimu bersama kami.</p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="#" class="bg-white text-indigo-600 hover:bg-indigo-50 px-8 py-4 rounded-lg font-medium transition duration-300">
                Daftar Sekarang
            </a>
            <a href="#kontak" class="bg-transparent border-2 border-white text-white hover:bg-white/10 px-8 py-4 rounded-lg font-medium transition duration-300">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<!-- Map Section -->
<div class="w-full h-96 bg-gray-200 dark:bg-gray-800 relative">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-300 dark:bg-gray-700">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
            </svg>
            <p class="text-gray-600 dark:text-gray-400 text-lg">Peta Lokasi</p>
            <p class="text-gray-500 dark:text-gray-500">Google Maps akan dimuat di sini</p>
        </div>
    </div>
</div>
@endsection