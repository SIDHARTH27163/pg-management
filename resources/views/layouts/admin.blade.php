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
        @vite(['resources/css/app.css', 'resources/js/app.js' , 'resources/js/editor.js'])
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen bg-white dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Navbar -->
            

            <header class="bg-white dark:bg-gray-900 shadow-md relative z-10 py-2">
                <div class="max-w-screen-xl flex flex-wrap items-center lg:justify-center md:justify-center justify-between gap-x-5  mx-auto p-4">
                    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse md:hidden py-5">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200 py-5" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Dashboard</span>
                    </a>
                    
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="gap-x-3 font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/admin/dashboard" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">                            
                            Home
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">                            
                            User 
                            </a>
                        </li>
                        
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">                            
                            Room 
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">
                            Booking and Payment 
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">
                        Payments
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">                            
                            PG owner 
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">                            
                            Reports 
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">                           
                            Notifications
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                            class="text-md block py-2 px-2 whitespace-nowrap items-center border-b-2 border-transparent 
                            hover:border-gray-600 dark:hover:border-gray-100  font-medium leading-5 
                            text-gray-900 dark:text-gray-100 focus:outline-none  
                            transition duration-300 ease-in-out">                            
                            Settings 
                            </a>
                        </li>
                    
                   
                    
                    </ul>
                </div>
                </div>
            </header>
  
            {{-- header --}}
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
