<x-home-layout>
    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4 py-2 ">
            <!-- Top Banner -->
            <div class="text-center mb-6">
                <span class="bg-orange-50 text-orange-700 px-6 py-2 rounded-full text-sm font-medium inline-block">
                    Join With Other Happy Tenants
                </span>
            </div>

            <!-- Main Content -->
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-[2.5rem] leading-tight font-bold mb-6 tracking-tight 
                    bg-clip-text text-transparent 
                    bg-gradient-to-r from-rose-600 via-yellow-500 to-rose-600 dark:bg-gradient-to-r dark:from-rose-600 dark:via-yellow-500 dark:to-rose-600 
                    text-gray-700 dark:text-transparent">
                    Comfortable and Affordable PG Accommodations<br />for Every Need
                </h1>
                <p class="text-lg dark:text-gray-500 text-gray-700 mb-6 max-w-2xl mx-auto leading-relaxed">
                    Looking for a hassle-free place to stay? Our PG services offer comfortable, fully-furnished rooms with all the amenities you need. Whether you're a student, working professional, or someone in need of a convenient living arrangement, we've got you covered!
                </p>
            </div>
        </div>
    </section>
    
    <section class="py-5 bg-white dark:bg-gradient-to-r dark:from-slate-950 dark:via-red-700 dark:to-slate-950">
        <div class="max-w-7xl mx-auto p-5 grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5">
            @foreach($rooms as $room)
            <!-- Card -->
            <div class="lg:max-w-sm md:max-w-sm bg-zinc-950/10 bg-opacity-30 rounded-3xl p-4 dark:backdrop-blur-3xl backdrop-blur-lg dark:shadow-2xl 
            shadow-lg hover-lift">           
               <a href="#">
                   <img class="rounded-t-lg" src="{{$room->cover_images[0]['cover_image_path'] }}"  alt="Blog Image" />
               </a>
               <div class="px-1 py-5">
                   <a href="{{ url('/view-room/' . $room->id) }}">
                    <p class="mb-3 font-normal  text-lg bg-clip-text text-transparent 
                    bg-gradient-to-r from-gray-950 via-purple-900 to-rose-600 
                    dark:bg-gradient-to-r dark:from-yellow-400 dark:via-white dark:to-sky-500 text-justify tracking-tight leading-6">
                        {{ strlen(strip_tags($room->description)) > 200 
                            ? substr(strip_tags($room->description), 0, 200) . '...' 
                            : strip_tags($room->description) }}
                    </p>       
                   </a>                  
                   <a href="{{ url('/view-room/' . $room->id) }}" class="inline-flex items-center px-3 py-4 text-sm font-medium text-center text-white dark:bg-zinc-100/10 dark:bg-opacity-30 rounded-xl focus:ring-4 focus:outline-none 
                   transform transition duration-400 hover:scale-110 bg-gradient-to-r from-slate-900 via-rose-700 to-slate-900">
                       Read more
                       <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                       </svg>
                   </a>
               </div>
           </div>
            @endforeach
            <!-- End Card -->
        </div>
        <div class="mt-6 max-w-7xl mx-auto px-2">
            {{ $rooms->links() }}
        </div>
    </section>
    
    

</x-home-layout>
