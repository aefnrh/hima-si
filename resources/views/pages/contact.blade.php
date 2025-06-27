@extends('layouts.main')

@section('content')
<style>
    /* Animasi untuk elemen saat scroll */
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .fade-in-up.appear {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animasi untuk kartu kontak */
    .contact-card {
        transition: all 0.3s ease;
    }
    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    /* Animasi untuk input form */
    .form-input-animation {
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-input-animation:focus {
        border-color: #667EEA;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    }
</style>
<!-- Hero Section with Background -->
<div class="relative bg-gradient-to-r from-gray-800 to-gray-900 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80')] bg-cover bg-center opacity-20"></div>
    
    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight animate__animated animate__fadeInDown">
                <span class="text-white">Hubungi</span> <span class="text-indigo-300">Kami</span>
            </h1>
            <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto mb-8 leading-relaxed">
                HIMA SI sebagai sarana warga S1 Sistem Informasi Universitas Kuningan untuk berkomunikasi, 
                menampung aspirasi, dan mengembangkan diri bersama.
            </p>
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <a href="#contact-form" class="bg-white text-gray-800 hover:bg-gray-100 px-6 py-3 rounded-full font-medium transition duration-300 flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Kirim Pesan
                </a>
                <a href="#location" class="bg-transparent text-white border-2 border-white hover:bg-white hover:text-gray-800 px-6 py-3 rounded-full font-medium transition duration-300 flex items-center hover:shadow-xl transform hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Lokasi Kami
                </a>
            </div>
        </div>
    </div>
    
    <!-- Wave Separator -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
            <path fill="#f9fafb" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div>

<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">

        <!-- Contact Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16 fade-in-up">            <!-- Quick Contact Cards -->
            <div class="bg-white rounded-xl shadow-xl p-6 transform transition duration-500 hover:scale-105 border-b-4 border-indigo-600 contact-card">
                <div class="bg-indigo-100 text-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-2">Telepon Kami</h3>
                <p class="text-gray-600 text-center mb-4">Tersedia pada jam kerja untuk menjawab pertanyaan Anda</p>
                <p class="text-indigo-600 font-semibold text-center text-lg">{{ $settings['phone'] ?? '+62 812 3456 7890' }}</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-xl p-6 transform transition duration-500 hover:scale-105 border-b-4 border-indigo-600 contact-card">
                <div class="bg-indigo-100 text-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-2">Email Kami</h3>
                <p class="text-gray-600 text-center mb-4">Kami akan membalas email Anda secepat mungkin</p>
                <p class="text-indigo-600 font-semibold text-center text-lg">{{ $settings['email'] ?? 'himasi@uniku.ac.id' }}</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-xl p-6 transform transition duration-500 hover:scale-105 border-b-4 border-indigo-600 contact-card">
                <div class="bg-indigo-100 text-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-2">Kunjungi Kami</h3>
                <p class="text-gray-600 text-center mb-4">Temui kami langsung di kampus</p>
                <p class="text-indigo-600 font-semibold text-center text-lg">Kampus 2 Universitas Kuningan</p>
            </div>
        </div>

        <!-- Main Contact Section -->
        <div class="flex flex-col lg:flex-row gap-8 fade-in-up" id="contact-form">
            <!-- Contact Form -->
            <div class="w-full lg:w-2/3 bg-white rounded-xl shadow-xl p-8 border border-gray-100">
                <div class="flex items-center mb-8">
                    <span class="bg-indigo-100 text-indigo-600 p-2 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </span>
                    <h2 class="text-2xl font-bold text-gray-800">Kirim Pesan Kepada Kami</h2>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6" role="alert">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 form-input-animation" placeholder="Masukkan nama lengkap" required>
                            </div>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 form-input-animation" placeholder="Masukkan alamat email" required>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                            </div>
                            <input type="text" name="subject" id="subject" class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 form-input-animation" placeholder="Subjek pesan" required>
                        </div>
                        @error('subject')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                        <div class="relative">
                            <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <textarea name="message" id="message" rows="6" class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 form-input-animation" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-8 py-3 rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center">
                            <span>Kirim Pesan</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="w-full lg:w-1/3 bg-gradient-to-br from-gray-800 to-indigo-900 text-white rounded-xl shadow-xl p-8 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute top-0 right-0 w-full h-full opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-48 h-48 absolute top-0 right-0 text-white">
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
                
                <div class="relative z-10">
                    <div class="flex items-center mb-8">
                        <span class="bg-white/20 p-2 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <h2 class="text-2xl font-bold">Informasi Kontak</h2>
                    </div>
                    
                    <p class="mb-8 text-white/90">Jangan ragu untuk menghubungi kami kapan saja. Kami siap membantu Anda dengan segala pertanyaan atau kebutuhan informasi.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-white/20 p-2 rounded-lg mr-4 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Alamat</h3>
                                <p class="mt-1 text-white/90">Kampus 2 Universitas Kuningan, Jl. Pramuka, Kuningan, Jawa Barat 45151</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-white/20 p-2 rounded-lg mr-4 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Email</h3>
                                <p class="mt-1 text-white/90">{{ $settings['email'] ?? 'himasi@uniku.ac.id' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-white/20 p-2 rounded-lg mr-4 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Telepon</h3>
                                <p class="mt-1 text-white/90">{{ $settings['phone'] ?? '+62 812 3456 7890' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <h3 class="font-semibold text-lg mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            <a href="{{ $settings['instagram'] ?? '#' }}" target="_blank" class="bg-white/20 p-2 rounded-lg hover:bg-white/30 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="{{ $settings['twitter'] ?? '#' }}" target="_blank" class="bg-white/20 p-2 rounded-lg hover:bg-white/30 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="{{ $settings['facebook'] ?? '#' }}" target="_blank" class="bg-white/20 p-2 rounded-lg hover:bg-white/30 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Maps Section -->
        <div class="mt-16 mb-12 fade-in-up" id="location">
            <div class="flex items-center mb-8">
                <span class="bg-indigo-100 text-indigo-600 p-2 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </span>
                <h2 class="text-2xl font-bold text-gray-800">Lokasi Kami</h2>
            </div>
            
            <div class="bg-white p-4 rounded-xl shadow-xl overflow-hidden relative">
                <!-- Map Container with Responsive Aspect Ratio -->
                <div class="relative w-full overflow-hidden rounded-lg" style="padding-top: 50%;"> <!-- 2:1 Aspect Ratio -->
                    <iframe 
                        class="absolute top-0 left-0 w-full h-full" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.6982339901066!2d108.48375931477271!3d-6.809401968479171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f2481e7c3b0bd%3A0x4c6f35e8c1ed195e!2sUniversitas%20Kuningan!5e0!3m2!1sid!2sid!4v1625123456789!5m2!1sid!2sid" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                
                <!-- Map Overlay with Quick Info -->
                <div class="absolute top-6 left-6 bg-white p-4 rounded-lg shadow-lg max-w-xs z-10 hidden md:block">
                    <h3 class="font-bold text-gray-800 mb-2">HIMA-SI Universitas Kuningan</h3>
                    <p class="text-gray-600 text-sm mb-3">Kampus 2 Universitas Kuningan, Jl. Pramuka, Kuningan, Jawa Barat 45151</p>
                    <a href="https://goo.gl/maps/YourActualGoogleMapsLink" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                        <span>Petunjuk Arah</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

        <!-- FAQ Section -->
        <div class="mt-16 mb-12 fade-in-up">
            <div class="flex items-center mb-8">
                <span class="bg-indigo-100 text-indigo-600 p-2 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <h2 class="text-2xl font-bold text-gray-800">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- FAQ Items -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Bagaimana cara bergabung dengan HIMA-SI?</h3>
                        <p class="text-gray-600">Untuk bergabung dengan HIMA-SI, Anda perlu menjadi mahasiswa aktif jurusan Sistem Informasi di Universitas Kuningan. Pendaftaran anggota baru biasanya dibuka pada awal tahun akademik. Pantau pengumuman resmi kami untuk informasi lebih lanjut.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Apa saja kegiatan rutin HIMA-SI?</h3>
                        <p class="text-gray-600">HIMA-SI menyelenggarakan berbagai kegiatan rutin seperti seminar teknologi, workshop pengembangan keterampilan, kompetisi pemrograman, dan kegiatan sosial. Kami juga mengadakan pertemuan anggota secara berkala untuk membahas perkembangan organisasi.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Bagaimana cara mengajukan kerjasama dengan HIMA-SI?</h3>
                        <p class="text-gray-600">Untuk mengajukan kerjasama, silakan kirim proposal resmi ke email kami di {{ $settings['email'] ?? 'himasi@uniku.ac.id' }}. Proposal akan dibahas oleh pengurus dan kami akan menghubungi Anda untuk diskusi lebih lanjut.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Apakah HIMA-SI menyediakan program mentoring?</h3>
                        <p class="text-gray-600">Ya, HIMA-SI memiliki program mentoring untuk mahasiswa baru dan anggota yang ingin mengembangkan keterampilan tertentu. Program ini menghubungkan mahasiswa dengan senior atau profesional di bidang Sistem Informasi.</p>
                    </div>
                </div>
            </div>

            <!-- More Questions CTA -->
            <div class="mt-8 text-center">
                <p class="text-gray-600 mb-4">Masih punya pertanyaan lain? Jangan ragu untuk menghubungi kami</p>
                <a href="#contact-form" class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-6 py-3 rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition duration-300 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span>Tanyakan Kepada Kami</span>
                </a>
            </div>
        </div>
</div>
<script>
    // Script untuk animasi scroll
    document.addEventListener('DOMContentLoaded', function() {
        // Aktifkan animasi untuk elemen yang sudah terlihat saat halaman dimuat
        const fadeElements = document.querySelectorAll('.fade-in-up');
        
        // Fungsi untuk memeriksa apakah elemen terlihat dalam viewport
        const isElementInViewport = function(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.8
            );
        };
        
        // Fungsi untuk menambahkan kelas 'appear' ke elemen yang terlihat
        const handleScroll = function() {
            fadeElements.forEach(function(element) {
                if (isElementInViewport(element)) {
                    element.classList.add('appear');
                }
            });
        };
        
        // Jalankan sekali saat halaman dimuat
        handleScroll();
        
        // Tambahkan event listener untuk scroll
        window.addEventListener('scroll', handleScroll);
    });
</script>
@endsection