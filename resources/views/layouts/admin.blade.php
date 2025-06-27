<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HIMA SI UNIKU') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-white shadow-md fixed h-full">
                <div class="p-4 border-b border-gray-200">
                    <a href="{{ route('admin.dashboard') }}" class="text-[#FF750F] font-bold text-xl flex items-center">
                        <span>HIMA SI UNIKU</span>
                        <span class="ml-2 text-sm text-gray-500">Admin</span>
                    </a>
                </div>
                <nav class="mt-4">
                    <ul>
                        <li class="mb-2">
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 border-l-4 border-[#FF750F]' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('admin.kabinet.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.kabinet.*') ? 'bg-gray-100 border-l-4 border-[#FF750F]' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span>Kabinet</span>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('admin.divisions.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.divisions.*') ? 'bg-gray-100 border-l-4 border-[#FF750F]' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Divisi</span>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('admin.members.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.members.*') ? 'bg-gray-100 border-l-4 border-[#FF750F]' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Anggota</span>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('admin.events.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.events.*') ? 'bg-gray-100 border-l-4 border-[#FF750F]' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Acara</span>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('admin.aspirations.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.aspirations.*') ? 'bg-gray-100 border-l-4 border-[#FF750F]' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    <span>Aspirasi</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="absolute bottom-0 w-full p-4 border-t border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="ml-64 w-full">
                <!-- Top Navigation -->
                <div class="bg-white shadow-sm">
                    <div class="px-4 py-2 flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800">
                            @yield('header', 'Dashboard')
                        </h2>
                        <div class="flex items-center">
                            <span class="text-sm text-gray-700 mr-2">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Page Content -->
                <main class="py-4 px-4">
                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>