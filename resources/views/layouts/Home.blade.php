<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/card.css','resources/css/comon.css','resources/css/crousel.css','resources/js/crousel.js', 'resources/js/app.js'])
    </head>
    <body class="dark:bg-[#0f0f0f] bg-white min-h-screen">
       
            @include('components/homeNavbar')
    
            <!-- Page Heading -->
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @include('components/footer')
    </body>
    
</html>
