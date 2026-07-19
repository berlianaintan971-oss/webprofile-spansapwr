<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Portal Akses - SMP Negeri 1 Purworejo</title>
        
        <link rel="icon" type="image/png" href="{{ asset('images/logo-sekolah.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            *, body {
                font-family: 'Poppins', sans-serif !important;
            }
        </style>
    </head>
    <body class="text-gray-900 antialiased bg-slate-100 flex flex-col sm:justify-center items-center min-h-screen p-4">
        
        <div class="mb-4 text-center">
            <a href="/">
                <img src="{{ asset('images/logo-sekolah.png') }}" class="w-20 h-20 object-contain drop-shadow-md mx-auto" alt="Logo SPENSA">
            </a>
        </div>

        <div class="w-full sm:max-w-md bg-white shadow-xl shadow-slate-200/80 overflow-hidden rounded-2xl border border-slate-100 p-6 sm:p-8">
            {{ $slot }}
        </div>

    </body>
</html>