

<div class="bg-zinc-900/30 backdrop-blur-xl  border border-white/5 shadow-lg sticky w-full top-0 z-50">
    <nav class="">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-1">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://res.cloudinary.com/dd9xaofdu/image/upload/v1740755023/cozyway_crh5fc.jpg" class="h-12 w-auto rounded-sm" alt="CozyWay Logo" />
                {{-- <span class="text-2xl font-bold text-gradient">CozyWay.</span> --}}
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <label class="inline-flex items-center cursor-pointer mx-4">
                    <input type="checkbox" id="theme-toggle" class="sr-only peer">
                    <div class="relative w-11 h-6 bg-black peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-gray-300 dark:peer-focus:ring-gray-100 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-gray-400 after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-gray-400"></div>
                    
                  </label>
                <a href="tel:5541251234" class="text-sm  text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>
                <a href="{{ route('login') }}" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</a>
            </div>
        </div>
    </nav>
    <nav class="px-8 pb-2 flex justify-center items-center max-w-7xl mx-auto ">
        
        
        <div class="hidden md:flex items-center space-x-8 dark:text-white">
            <a href="/" class="nav-link">Home</a>
            <a href="/rooms" class="nav-link">Rooms</a>
            <a href="/gallery" class="nav-link">Gallery</a>
            <a href="/pricing" class="nav-link">Pricing</a>
            <a href="{{ route('login') }}" class="nav-link">Contact</a>
        </div>

        
    </nav>
    
</div>

