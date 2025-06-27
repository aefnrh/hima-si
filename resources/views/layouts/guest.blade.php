<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'HIMA SI Admin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .login-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            .login-card {
                backdrop-filter: blur(10px);
                background-color: rgba(255, 255, 255, 0.9);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            .login-card.dark {
                background-color: rgba(30, 41, 59, 0.9);
                border: 1px solid rgba(30, 41, 59, 0.2);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 login-bg">
            <div class="mb-4">
                <a href="/">
                    <img src="{{ asset('images/LOGO HIMA/Logo Text Putih.png') }}" alt="HIMA SI Logo" class="w-48 h-auto">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-6 login-card dark:login-card dark shadow-lg overflow-hidden sm:rounded-lg">
                <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Admin Panel</h2>
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-white text-sm">
                &copy; {{ date('Y') }} Himpunan Mahasiswa Sistem Informasi Universitas Kuningan
            </div>
        </div>
    </body>
</html>