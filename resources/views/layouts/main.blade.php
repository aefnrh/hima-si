<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HIMSI UNIKU' }}</title>
    <meta name="description" content="{{ $description ?? 'Himpunan Mahasiswa Sistem Informasi Universitas Kuningan' }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Dark mode initialization script -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        
        // Tailwind Dark Mode Configuration
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#667EEA',
                        secondary: '#4A5568'
                    }
                }
            }
        }
        
        // Check for saved theme preference or use preferred color scheme
        if (localStorage.getItem('color-theme') === 'dark' || 
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Dark mode transitions */
        .dark body {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        
        html.transition,
        html.transition *,
        html.transition *:before,
        html.transition *:after {
            transition: all 0.3s ease !important;
            transition-delay: 0 !important;
        }
        
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #667EEA;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }
        .nav-link.active {
            color: #667EEA;
        }
        
        /* Dark mode specific styles */
        .dark .bg-white {
            background-color: #1a202c !important;
        }
        
        .dark .bg-gray-50 {
            background-color: #2d3748 !important;
        }
        
        .dark .bg-gray-100 {
            background-color: #2d3748 !important;
        }
        
        .dark .bg-gray-200 {
            background-color: #4a5568 !important;
        }
        
        .dark .text-gray-800 {
            color: #e2e8f0 !important;
        }
        
        .dark .text-gray-700 {
            color: #e2e8f0 !important;
        }
        
        .dark .text-gray-600 {
            color: #cbd5e0 !important;
        }
        
        .dark .border-gray-200 {
            border-color: #4a5568 !important;
        }
        
        .dark .shadow-lg,
        .dark .shadow-md,
        .dark .shadow-xl {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2) !important;
        }
        
        /* Dark mode card styles */
        .dark .bg-indigo-50 {
            background-color: #2d3748 !important;
        }
        
        .dark .bg-indigo-100 {
            background-color: #3a4a61 !important;
        }
        
        .dark .text-indigo-600 {
            color: #a3bffa !important;
        }
        
        .dark .text-indigo-700 {
            color: #a3bffa !important;
        }
        
        /* Dark mode button styles */
        .dark .bg-indigo-600 {
            background-color: #5a67d8 !important;
        }
        
        .dark .hover\:bg-indigo-700:hover {
            background-color: #4c51bf !important;
        }
        
        /* Dark mode input styles */
        .dark input, .dark textarea, .dark select {
            background-color: #2d3748 !important;
            border-color: #4a5568 !important;
            color: #e2e8f0 !important;
        }
        
        /* Dark mode footer styles */
        .dark footer {
            background-color: #1a202c !important;
            color: #e2e8f0 !important;
        }
        
        /* Dark mode for preloader */
        .dark .preloader {
            background-color: #1a202c !important;
        }
        
        /* Dark mode for back to top button */
        .dark .back-to-top {
            background-color: #4c51bf !important;
            color: #e2e8f0 !important;
        }
        
        /* Dark mode for testimonials */
        .dark .bg-indigo-500 {
            background-color: #4c51bf !important;
        }
        
        .dark .bg-indigo-600 {
            background-color: #434190 !important;
        }
        
        /* Dark mode for cards and sections */
        .dark .bg-gradient-to-r {
            background: linear-gradient(to right, #2d3748, #1a202c) !important;
        }
        
        .dark .bg-gradient-to-br {
            background: linear-gradient(to bottom right, #2d3748, #1a202c) !important;
        }
        
        /* Dark mode for images */
        .dark img {
            filter: brightness(0.9);
        }
        
        /* Dark mode for SVG icons */
        .dark svg:not([fill="currentColor"]) {
            filter: brightness(0.9);
        }
        
        /* Dark mode for form elements */
        .dark input::placeholder,
        .dark textarea::placeholder {
            color: #a0aec0 !important;
        }
        
        /* Dark mode for links */
        .dark a:not(.nav-link):not(.bg-indigo-600):not(.bg-indigo-500) {
            color: #90cdf4 !important;
        }
        
        .dark a:not(.nav-link):not(.bg-indigo-600):not(.bg-indigo-500):hover {
            color: #63b3ed !important;
        }
        
        /* Dark mode for tables */
        .dark table {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
        }
        
        .dark th {
            background-color: #1a202c !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        .dark td {
            border-color: #4a5568 !important;
        }
        
        .dark tr:nth-child(even) {
            background-color: #283141 !important;
        }
        
        /* Dark mode for buttons */
        .dark button:not(.bg-indigo-600):not(.bg-indigo-500):not(#theme-toggle):not(#mobile-theme-toggle) {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        .dark button:not(.bg-indigo-600):not(.bg-indigo-500):not(#theme-toggle):not(#mobile-theme-toggle):hover {
            background-color: #4a5568 !important;
        }
        
        /* Dark mode for code blocks */
        .dark pre, .dark code {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        /* Dark mode for quotes */
        .dark blockquote {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        /* Dark mode for horizontal rules */
        .dark hr {
            border-color: #4a5568 !important;
        }
        
        /* Dark mode for badges */
        .dark .badge {
            background-color: #4a5568 !important;
            color: #e2e8f0 !important;
        }
        
        /* Dark mode for modals */
        .dark .modal-content {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        .dark .modal-header {
            border-color: #4a5568 !important;
        }
        
        .dark .modal-footer {
            border-color: #4a5568 !important;
        }
        
        /* Dark mode for dropdowns */
        .dark .dropdown-menu {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        .dark .dropdown-item {
            color: #e2e8f0 !important;
        }
        
        .dark .dropdown-item:hover {
            background-color: #4a5568 !important;
        }
        
        .dark .dropdown-divider {
            border-color: #4a5568 !important;
        }
        
        /* Dark mode for alerts */
        .dark .alert {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        /* Dark mode for tooltips */
        .dark .tooltip {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
        }
        
        /* Dark mode for progress bars */
        .dark .progress {
            background-color: #4a5568 !important;
        }
        
        /* Dark mode for pagination */
        .dark .pagination {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
        }
        
        .dark .page-link {
            background-color: #2d3748 !important;
            color: #e2e8f0 !important;
            border-color: #4a5568 !important;
        }
        
        .dark .page-item.active .page-link {
            background-color: #4c51bf !important;
            border-color: #4c51bf !important;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        /* Particles Animation */
        .particles-container {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        
        .particle {
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }
        
        .particle:nth-child(1) {
            top: 10%;
            left: 20%;
            width: 12px;
            height: 12px;
            animation-duration: 25s;
        }
        
        .particle:nth-child(2) {
            top: 40%;
            left: 10%;
            width: 10px;
            height: 10px;
            animation-duration: 20s;
            animation-delay: 2s;
        }
        
        .particle:nth-child(3) {
            top: 70%;
            left: 30%;
            animation-duration: 18s;
            animation-delay: 4s;
        }
        
        .particle:nth-child(4) {
            top: 20%;
            left: 60%;
            width: 14px;
            height: 14px;
            animation-duration: 22s;
            animation-delay: 1s;
        }
        
        .particle:nth-child(5) {
            top: 50%;
            left: 80%;
            animation-duration: 24s;
            animation-delay: 3s;
        }
        
        .particle:nth-child(6) {
            top: 80%;
            left: 50%;
            width: 10px;
            height: 10px;
            animation-duration: 21s;
            animation-delay: 5s;
        }
        
        .particle:nth-child(7) {
            top: 30%;
            left: 40%;
            width: 9px;
            height: 9px;
            animation-duration: 19s;
            animation-delay: 2.5s;
        }
        
        .particle:nth-child(8) {
            top: 60%;
            left: 70%;
            width: 11px;
            height: 11px;
            animation-duration: 23s;
            animation-delay: 1.5s;
        }
        
        .particle:nth-child(9) {
            top: 90%;
            left: 90%;
            animation-duration: 26s;
            animation-delay: 3.5s;
        }
        
        .particle:nth-child(10) {
            top: 15%;
            left: 85%;
            width: 13px;
            height: 13px;
            animation-duration: 27s;
            animation-delay: 4.5s;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 0.3;
            }
            25% {
                opacity: 0.6;
            }
            50% {
                transform: translateY(-100px) translateX(100px) rotate(180deg);
                opacity: 0.3;
            }
            75% {
                opacity: 0.6;
            }
            100% {
                transform: translateY(0) translateX(0) rotate(360deg);
                opacity: 0.3;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Flash Messages -->
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </button>
        </div>
        @endif
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </button>
        </div>
        @endif
        
        <!-- Navigation -->
        <header class="bg-white shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <nav class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center">
                            <img src="{{ asset('images/LOGO HIMA/LOGO HIMA SI BARU.png') }}" alt="Logo HIMA SI UNIKU" class="h-8 mr-2">
                            <img src="{{ asset('images/LOGO HIMA/Logo Text Putih.png') }}" alt="Logo HIMA SI UNIKU" class="h-14 mr-2">
                            <div class="flex flex-col">
                                <span class="text-2xl font-extrabold text-[#667EEA]">HIMA SI</span>
                                <span class="text-2xl font-bold text-gray-800 ml-1">UNIKU</span>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex space-x-1">
                        <a href="{{ url('/') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->is('/') ? 'text-[#667EEA] font-medium' : '' }}">Beranda</a>
                        <a href="{{ url('/about') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->is('about') ? 'text-[#667EEA] font-medium' : '' }}">Tentang Kami</a>
                        <a href="{{ route('kabinet.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('kabinet.*') ? 'text-[#667EEA] font-medium' : '' }}">Kabinet</a>
                        <a href="{{ route('clubs.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('clubs.*') ? 'text-[#667EEA] font-medium' : '' }}">Komunitas</a>
                        <a href="{{ route('events.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('events.*') ? 'text-[#667EEA] font-medium' : '' }}">Acara</a>
                        <a href="{{ route('gallery.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('gallery.*') ? 'text-[#667EEA] font-medium' : '' }}">Galeri</a>
                        <a href="{{ route('aspirations.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('aspirations.*') ? 'text-[#667EEA] font-medium' : '' }}">Aspirasi</a>
                        <a href="{{ route('contact.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('contact.*') ? 'text-[#667EEA] font-medium' : '' }}">Kontak</a>
                    </div>

                    <!-- Login Button and Dark Mode Toggle -->
                    <div class="hidden md:flex items-center space-x-4">
                        <!-- Dark Mode Toggle Button -->
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <a href="{{ route('login') }}" class="bg-[#667EEA] text-white px-4 py-2 rounded-md hover:bg-[#5A67D8] transition duration-300">Login</a>
                    </div>

                    <!-- Mobile Navigation Button -->
                    <div class="md:hidden flex items-center">
                        <button id="mobile-menu-button" class="text-gray-700 hover:text-[#667EEA] focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </nav>

                <!-- Mobile Navigation Menu -->
                <div id="mobile-menu" class="md:hidden hidden py-4">
                    <div class="flex flex-col space-y-2">
                        <a href="{{ url('/') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->is('/') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Beranda</a>
                        <a href="{{ url('/about') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->is('about') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Tentang Kami</a>
                        <a href="{{ route('kabinet.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('kabinet.*') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Kabinet</a>
                        <a href="{{ route('clubs.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('clubs.*') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Komunitas</a>
                        <a href="{{ route('events.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('events.*') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Acara</a>
                        <a href="{{ route('gallery.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('gallery.*') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Galeri</a>
                        <a href="{{ route('aspirations.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('aspirations.*') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Aspirasi</a>
                        <a href="{{ route('contact.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 {{ request()->routeIs('contact.*') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">Kontak</a>
                        <a href="{{ route('newsletter.subscribers') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-[#667EEA] hover:bg-indigo-50 transition duration-300 flex items-center {{ request()->routeIs('newsletter.subscribers') ? 'text-[#667EEA] font-medium bg-indigo-50' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Newsletter
                        </a>
                        <div class="flex items-center justify-between py-2 border-t border-gray-200 mt-2">
                            <span class="text-gray-700 dark:text-gray-300">Dark Mode</span>
                            <button id="mobile-theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                                <svg id="mobile-theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                                <svg id="mobile-theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="pt-2">
                            <a href="{{ route('login') }}" class="block w-full text-center bg-[#667EEA] text-white px-4 py-2 rounded-md hover:bg-[#5A67D8] transition duration-300">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white pt-16 pb-8 relative overflow-hidden">
            <!-- Animated background particles -->
            <div class="absolute inset-0 opacity-30">
                <div class="particles-container">
                    @for($i = 1; $i <= 30; $i++)
                        <div class="particle"></div>
                    @endfor
                </div>
            </div>
            
            <!-- Decorative elements -->
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#667EEA] via-[#764BA2] to-[#FF750F]"></div>
            <div class="absolute -top-10 right-10 w-60 h-60 bg-[#667EEA] opacity-20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-40 -left-20 w-80 h-80 bg-[#FF750F] opacity-15 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-40 h-40 bg-gradient-to-br from-[#667EEA] to-[#764BA2] opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/2 left-1/3 w-20 h-20 bg-gradient-to-br from-[#FF750F] to-[#F7B733] opacity-10 rounded-full blur-xl animate-ping"></div>
            <div class="absolute top-1/4 right-1/4 w-10 h-10 bg-white opacity-5 rounded-full blur-md animate-ping"></div>
            
            <div class="container mx-auto px-4 relative z-10"></div>
                <!-- Footer Top Section with Logo and Info -->
                <div class="flex flex-col md:flex-row justify-between mb-12 gap-8">
                    <div class="mb-8 md:mb-0 md:w-1/3 transform hover:scale-105 transition duration-500 group">
                        <div class="flex items-center mb-4 bg-gradient-to-br from-gray-800 to-gray-900 p-5 rounded-xl shadow-2xl border border-gray-700 group-hover:border-[#667EEA] transition-all duration-500 relative overflow-hidden">
                            <!-- Decorative elements for logo container -->
                            <div class="absolute -top-10 -right-10 w-20 h-20 bg-[#667EEA] opacity-20 rounded-full blur-xl group-hover:opacity-40 transition-opacity duration-500"></div>
                            <div class="absolute -bottom-10 -left-10 w-20 h-20 bg-[#FF750F] opacity-20 rounded-full blur-xl group-hover:opacity-40 transition-opacity duration-500"></div>
                            
                            <div class="relative z-10 flex items-center">
                                <img src="{{ asset('images/LOGO HIMA/LOGO HIMA SI BARU.png') }}" alt="Logo HIMA SI UNIKU" class="h-10 mr-3 filter drop-shadow-lg transform group-hover:scale-110 transition-transform duration-500">
                                <img src="{{ asset('images/LOGO HIMA/Logo Text Putih.png') }}" alt="Logo HIMA SI UNIKU" class="h-16 filter drop-shadow-lg transform group-hover:scale-110 transition-transform duration-500">
                            </div>
                        </div>
                        
                        <div class="relative overflow-hidden rounded-xl mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#667EEA] to-[#764BA2] opacity-5 group-hover:opacity-10 transition-opacity duration-500"></div>
                            <p class="text-gray-300 max-w-md leading-relaxed backdrop-blur-sm bg-gray-800 bg-opacity-40 p-5 rounded-xl border border-gray-700 group-hover:border-[#667EEA] transition-all duration-500 shadow-xl relative z-10">
                                Himpunan Mahasiswa Sistem Informasi Universitas Kuningan sebagai sarana warga S1 Sistem Informasi untuk berkomunikasi, menampung aspirasi, dan mengembangkan diri bersama.
                                <span class="block mt-2 text-xs text-gray-400 italic">Bergabunglah dengan komunitas kami untuk pengalaman akademik yang lebih bermakna.</span>
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ $settings['tiktok'] ?? 'https://www.tiktok.com/@hima.si.uniku' }}" target="_blank" 
                               class="bg-gradient-to-r from-gray-800 to-gray-900 hover:from-[#667EEA] hover:to-[#764BA2] text-white p-3 rounded-xl transition duration-500 transform hover:scale-110 hover:rotate-6 shadow-lg border border-gray-700 hover:border-[#667EEA] relative overflow-hidden group/icon">
                                <div class="absolute inset-0 bg-black opacity-20 group-hover/icon:opacity-0 transition-opacity duration-300"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298-.002.595.042.88.13V9.4a6.37 6.37 0 0 0-1-.08A6.34 6.34 0 0 0 3 15.66a6.34 6.34 0 0 0 10.95 4.37 6.37 6.37 0 0 0 1.83-4.37l-.01-7.08a8.16 8.16 0 0 0 3.82.92V6.69z"/>
                                </svg>
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-[#667EEA] to-[#764BA2] transform scale-x-0 group-hover/icon:scale-x-100 transition-transform duration-300 origin-left"></span>
                            </a>
                            <a href="{{ $settings['youtube'] ?? 'http://youtube.com/@HIMASIFKOM-UNIKU' }}" target="_blank" 
                               class="bg-gradient-to-r from-gray-800 to-gray-900 hover:from-red-600 hover:to-red-700 text-white p-3 rounded-xl transition duration-500 transform hover:scale-110 hover:rotate-6 shadow-lg border border-gray-700 hover:border-red-500 relative overflow-hidden group/icon">
                                <div class="absolute inset-0 bg-black opacity-20 group-hover/icon:opacity-0 transition-opacity duration-300"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                </svg>
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-red-600 to-red-700 transform scale-x-0 group-hover/icon:scale-x-100 transition-transform duration-300 origin-left"></span>
                            </a>
                            <a href="{{ $settings['whatsapp'] ?? 'https://wa.me/6283139735673' }}" target="_blank" 
                               class="bg-gradient-to-r from-gray-800 to-gray-900 hover:from-green-500 hover:to-green-600 text-white p-3 rounded-xl transition duration-500 transform hover:scale-110 hover:rotate-6 shadow-lg border border-gray-700 hover:border-green-500 relative overflow-hidden group/icon">
                                <div class="absolute inset-0 bg-black opacity-20 group-hover/icon:opacity-0 transition-opacity duration-300"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-green-500 to-green-600 transform scale-x-0 group-hover/icon:scale-x-100 transition-transform duration-300 origin-left"></span>
                            </a>
                            <a href="{{ $settings['instagram'] ?? 'https://www.instagram.com/himasi_uniku?' }}" target="_blank" 
                               class="bg-gradient-to-r from-gray-800 to-gray-900 hover:from-purple-500 hover:to-pink-500 text-white p-3 rounded-xl transition duration-500 transform hover:scale-110 hover:rotate-6 shadow-lg border border-gray-700 hover:border-pink-500 relative overflow-hidden group/icon">
                                <div class="absolute inset-0 bg-black opacity-20 group-hover/icon:opacity-0 transition-opacity duration-300"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-purple-500 to-pink-500 transform scale-x-0 group-hover/icon:scale-x-100 transition-transform duration-300 origin-left"></span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:w-2/3">
                        <!-- Quick Links -->
                        <div class="backdrop-blur-sm bg-gradient-to-br from-gray-800 to-gray-900 bg-opacity-40 p-6 rounded-xl transform hover:scale-105 transition duration-500 border border-gray-700 hover:border-[#667EEA] shadow-xl relative overflow-hidden group">
                            <!-- Decorative elements -->
                            <div class="absolute -top-10 -right-10 w-20 h-20 bg-[#667EEA] opacity-10 rounded-full blur-xl group-hover:opacity-20 transition-opacity duration-500"></div>
                            
                            <div class="flex items-center mb-6 space-x-3">
                                <div class="p-2 bg-gradient-to-r from-[#667EEA] to-[#764BA2] rounded-lg shadow-lg transform group-hover:rotate-6 transition-transform duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white relative inline-block">
                                    <span class="relative z-10">Tautan Cepat</span>
                                    <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-[#667EEA] to-[#764BA2]"></span>
                                </h3>
                            </div>
                            
                            <ul class="space-y-4 relative z-10">
                                @php
                                $links = [
                                    ['path' => '/', 'label' => 'Beranda', 'type' => 'url', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />'],
                                    ['path' => '/about', 'label' => 'Tentang Kami', 'type' => 'url', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'],
                                    ['path' => 'events.index', 'label' => 'Acara', 'type' => 'route', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />'],
                                    ['path' => 'aspirations.index', 'label' => 'Aspirasi', 'type' => 'route', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />'],
                                    ['path' => 'contact.index', 'label' => 'Kontak', 'type' => 'route', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />']
                                ];
                                @endphp
                                @foreach($links as $link)
                                    <li class="group/link transform hover:-translate-y-1 transition-all duration-300">
                                        <a href="{{ $link['type'] === 'url' ? url($link['path']) : route($link['path']) }}" 
                                           class="flex items-center p-2 rounded-lg bg-gray-800 bg-opacity-50 hover:bg-gradient-to-r hover:from-[#667EEA] hover:to-[#764BA2] transition duration-300 border border-transparent hover:border-white/20 shadow-md hover:shadow-lg">
                                            <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-gray-700 flex items-center justify-center mr-3 group-hover/link:bg-white/10 transition-colors duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300 group-hover/link:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    {!! $link['icon'] !!}
                                                </svg>
                                            </span>
                                            <span class="text-gray-300 group-hover/link:text-white transition-colors duration-300">{{ $link['label'] }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-gray-400 group-hover/link:text-white transition-colors duration-300 transform translate-x-0 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Contact Info -->
                        <div class="backdrop-blur-sm bg-gradient-to-br from-gray-800 to-gray-900 bg-opacity-40 p-6 rounded-xl transform hover:scale-105 transition duration-500 border border-gray-700 hover:border-[#FF750F] shadow-xl relative overflow-hidden group">
                            <!-- Decorative elements -->
                            <div class="absolute -top-10 -right-10 w-20 h-20 bg-[#FF750F] opacity-10 rounded-full blur-xl group-hover:opacity-20 transition-opacity duration-500"></div>
                            
                            <div class="flex items-center mb-6 space-x-3">
                                <div class="p-2 bg-gradient-to-r from-[#FF750F] to-[#F7B733] rounded-lg shadow-lg transform group-hover:rotate-6 transition-transform duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white relative inline-block">
                                    <span class="relative z-10">Kontak Kami</span>
                                    <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-[#FF750F] to-[#F7B733]"></span>
                                </h3>
                            </div>
                            
                            <ul class="space-y-4 relative z-10">
                                <li class="group/contact transform hover:-translate-y-1 transition-all duration-300">
                                    <div class="flex items-start p-3 rounded-lg bg-gray-800 bg-opacity-50 border border-transparent group-hover/contact:border-[#FF750F]/30 transition-all duration-300 shadow-md group-hover/contact:shadow-lg">
                                        <span class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-[#667EEA] to-[#764BA2] rounded-lg flex items-center justify-center shadow-lg transform group-hover/contact:rotate-6 transition-transform duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3 text-gray-300 group-hover/contact:text-white transition-colors duration-300">{{ $settings['address'] ?? 'Jl. Pramuka No.67, Purwawinangun, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45512' }}</span>
                                    </div>
                                </li>
                                <li class="group/contact transform hover:-translate-y-1 transition-all duration-300">
                                    <div class="flex items-start p-3 rounded-lg bg-gray-800 bg-opacity-50 border border-transparent group-hover/contact:border-[#667EEA]/30 transition-all duration-300 shadow-md group-hover/contact:shadow-lg">
                                        <span class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-[#667EEA] to-[#764BA2] rounded-lg flex items-center justify-center shadow-lg transform group-hover/contact:rotate-6 transition-transform duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3 text-gray-300 group-hover/contact:text-white transition-colors duration-300">{{ $settings['email'] ?? 'himas.si.fkom@uniku.ac.id' }}</span>
                                    </div>
                                </li>
                                <li class="group/contact transform hover:-translate-y-1 transition-all duration-300">
                                    <div class="flex items-start p-3 rounded-lg bg-gray-800 bg-opacity-50 border border-transparent group-hover/contact:border-[#FF750F]/30 transition-all duration-300 shadow-md group-hover/contact:shadow-lg">
                                        <span class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-[#FF750F] to-[#F7B733] rounded-lg flex items-center justify-center shadow-lg transform group-hover/contact:rotate-6 transition-transform duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3 text-gray-300 group-hover/contact:text-white transition-colors duration-300">{{ $settings['phone'] ?? '+62 811 2233 4455' }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Newsletter -->
                        <div class="backdrop-blur-sm bg-gradient-to-br from-gray-800 to-gray-900 bg-opacity-40 p-6 rounded-xl transform hover:scale-105 transition duration-300 border border-gray-700 shadow-lg relative overflow-hidden group">
                            <!-- Decorative elements -->
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-gradient-to-br from-[#667EEA] to-[#764BA2] opacity-20 rounded-full blur-xl"></div>
                            <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-[#FF750F] to-[#F7B733] opacity-20 rounded-full blur-xl group-hover:opacity-30 transition-opacity duration-500"></div>
                            
                            <div class="flex items-center mb-6 space-x-3">
                                <div class="p-2 bg-gradient-to-r from-[#FF750F] to-[#F7B733] rounded-lg shadow-lg transform group-hover:rotate-6 transition-transform duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white relative inline-block">
                                    <span class="relative z-10">Newsletter</span>
                                    <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-[#FF750F] to-[#F7B733]"></span>
                                </h3>
                            </div>
                            
                            @php
                                $subscriberCount = \App\Models\NewsletterSubscriber::count();
                            @endphp
                            
                            <div class="flex justify-between items-center mb-6">
                                <p class="text-gray-300 text-sm md:text-base">Dapatkan informasi terbaru dari kami langsung ke email Anda.</p>
                                <div class="bg-gradient-to-r from-[#667EEA] to-[#764BA2] px-3 py-1 rounded-full shadow-md animate-pulse">
                                    <div class="flex items-center space-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="text-sm font-medium text-white">{{ $subscriberCount }} Subscriber</span>
                                    </div>
                                </div>
                            </div>
                            
                            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-4 relative z-10">
                                @csrf
                                <div class="group">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" placeholder="Nama Anda" 
                                               class="w-full bg-gray-700 bg-opacity-50 text-white pl-10 pr-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF750F] transition duration-300 backdrop-blur-sm mb-3 border border-gray-600 group-hover:border-[#FF750F] transform group-hover:-translate-y-1 group-hover:shadow-lg">
                                    </div>
                                </div>
                                
                                <div class="group">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" name="email" placeholder="Email Anda" 
                                               class="w-full bg-gray-700 bg-opacity-50 text-white pl-10 pr-12 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF750F] transition duration-300 backdrop-blur-sm border border-gray-600 group-hover:border-[#FF750F] transform group-hover:-translate-y-1 group-hover:shadow-lg">
                                        <button type="submit" 
                                                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-[#667EEA] to-[#764BA2] text-white p-2 rounded-lg hover:from-[#764BA2] hover:to-[#667EEA] transition duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#667EEA] focus:ring-offset-gray-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="text-xs text-gray-400 italic mt-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-[#FF750F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Kami tidak akan mengirimkan spam ke email Anda</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom Section -->
                <div class="pt-8 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center relative overflow-hidden">
                    <!-- Decorative elements -->
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 opacity-50"></div>
                    <div class="absolute -left-10 top-1/2 transform -translate-y-1/2 w-40 h-40 bg-gradient-to-br from-[#667EEA] to-[#764BA2] opacity-5 rounded-full blur-xl"></div>
                    <div class="absolute -right-10 top-1/2 transform -translate-y-1/2 w-40 h-40 bg-gradient-to-br from-[#FF750F] to-[#F7B733] opacity-5 rounded-full blur-xl"></div>
                    
                    <div class="relative z-10 flex items-center space-x-2 mb-4 md:mb-0 group">
                        <div class="p-1 bg-gradient-to-r from-[#667EEA] to-[#764BA2] rounded-md shadow-lg transform group-hover:rotate-6 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <p class="text-gray-300 font-medium">&copy; {{ date('Y') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#667EEA] to-[#764BA2] font-bold">HIMA SI UNIKU</span>. All rights reserved.</p>
                    </div>
                    
                    <!-- Ikon di pojok kanan bawah telah dihapus -->
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Dark Mode Toggle Script
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        
        // Mobile dark mode toggle
        const mobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');
        const mobileThemeToggleDarkIcon = document.getElementById('mobile-theme-toggle-dark-icon');
        const mobileThemeToggleLightIcon = document.getElementById('mobile-theme-toggle-light-icon');

        // Function to set the correct icon state
        function setIconState() {
            const isDarkMode = localStorage.getItem('color-theme') === 'dark' ||
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
                
            // Desktop icons
            themeToggleDarkIcon.classList.toggle('hidden', isDarkMode);
            themeToggleLightIcon.classList.toggle('hidden', !isDarkMode);
            
            // Mobile icons
            mobileThemeToggleDarkIcon.classList.toggle('hidden', isDarkMode);
            mobileThemeToggleLightIcon.classList.toggle('hidden', !isDarkMode);
        }
        
        // Set initial icon state
        setIconState();
        
        // Function to toggle dark mode
        function toggleDarkMode() {
            // Add transition class to HTML for smooth color transitions
            document.documentElement.classList.add('transition');
            setTimeout(() => {
                document.documentElement.classList.remove('transition');
            }, 300);

            // If set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                // If NOT set via local storage previously
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
            
            // Update icon state after toggle
            setIconState();
        }

        // Add event listeners to both buttons
        themeToggleBtn.addEventListener('click', toggleDarkMode);
        mobileThemeToggleBtn.addEventListener('click', toggleDarkMode);
    </script>
</body>
</html>