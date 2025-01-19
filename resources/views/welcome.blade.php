<x-home-layout>
    <section class="hero ">
        <!-- Navigation -->
        <!-- Your Navbar Here -->

        <!-- Hero Section -->
        <div class="relative pt-5 overflow-hidden">
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

            <!-- Carousel Section -->
            @include('components/home-crousel')

            <!-- CTA Button -->
            <div class="text-center mt-12 mb-20">
                <button class="premium-button text-white px-8 py-3 rounded-full text-lg font-medium shadow-lg">
                    Get Started
                </button>
            </div>
        </div>
    </section>
{{-- 
 --}}

 <section id="home" class=" pt-5 pb-8 relative">
    <div class="max-w-7xl mx-auto px-4 diagonal-box">
        <div class="grid md:grid-cols-2 gap-12 items-center diagonal-content">
            <div class="space-y-8">
                <div class="inline-flex items-center space-x-2 bg-white/5 rounded-full px-4 py-2">
                    <span class="w-2 h-2 bg-[#ff6b6b] rounded-full"></span>
                    <span class="text-sm text-[#ff6b6b]">Available In Dharamshala</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold leading-tight dark:text-white">
                    Comfortable
                    <br/>
                    Living & 
                    <br/>
                    <span class="text-gradient">Affordable Stay</span>
                </h1>
                <p class="text-lg text-zinc-400 max-w-md">
                    Discover your perfect home away from home with our fully furnished and well-equipped accommodations. 
                    Experience comfort, convenience, and a warm community all under one roof.
                </p>
                
            </div>
            <div class="relative">
                <!-- Creative Grid Pattern -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="hover-lift aspect-square bg-gradient-to-br from-gray-100 to-gray-300 rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#ff6b6b]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div class="hover-lift aspect-square bg-gradient-to-br from-gray-100 to-gray-300 rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#ffd93d]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div class="hover-lift aspect-square bg-gradient-to-br from-gray-100 to-gray-300 rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#ff6b6b]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div class="hover-lift aspect-square bg-gradient-to-br from-gray-100 to-gray-300 rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#ffd93d]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div class="hover-lift aspect-square bg-gradient-to-br from-gray-100 to-gray-300 rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#ff6b6b]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div class="hover-lift aspect-square bg-gradient-to-br from-gray-100 to-gray-300 rounded-lg hover:scale-105 transition-transform flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#ffd93d]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Floating Elements -->
                <div class="absolute top-10 right-10 w-20 h-20 bg-[#ff6b6b]/20 rounded-full blur-2xl"></div>
                <div class="absolute bottom-10 left-10 w-32 h-32 bg-[#ffd93d]/20 rounded-full blur-2xl"></div>
            </div>
        </div>
    </div>
</section>
   {{--  --}}
   {{-- cards --}}
   <section id="work" class="py-20 custom-shape dark:bg-zinc-950 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="mb-16">
            <span class="text-[#ff6b6b] text-sm uppercase tracking-wider">Explore </span>
            <h2 class="text-4xl font-bold mt-2 dark:text-white text-black">Our Gallery And Pg</h2>
        </div>
        
        <!-- Staggered Grid -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Project Card 1 -->
            <div class="group relative h-[600px] bg-black rounded-2xl overflow-hidden hover-lift">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     alt="Project Alpha" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/90 z-10"></div>
                <div class="absolute bottom-8 left-8 z-20">
                    <h3 class="text-2xl font-bold mb-2 text-gradient">Project Alpha</h3>
                    <p class="text-zinc-400 mb-4">Web Development</p>
                    <a href="#" class="inline-flex items-center space-x-2 text-[#ff6b6b] group-hover:text-white transition-colors duration-300">
                        <span>View Case Study</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Project Card 2 (Offset) -->
            <div class="group relative h-[600px] bg-black rounded-2xl overflow-hidden hover-lift mt-12 md:mt-24">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     alt="Project Beta" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/90 z-10"></div>
                <div class="absolute bottom-8 left-8 z-20">
                    <h3 class="text-2xl font-bold mb-2 text-gradient">Project Beta</h3>
                    <p class="text-zinc-400 mb-4">UI/UX Design</p>
                    <a href="#" class="inline-flex items-center space-x-2 text-[#ff6b6b] group-hover:text-white transition-colors duration-300">
                        <span>View Case Study</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
   {{-- cards --}}
  

<!-- Contact Section -->
<section id="contact" class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-zinc-900/50 rounded-3xl p-12 backdrop-blur-xl border border-white/5 shadow-lg">
            <div class="grid md:grid-cols-2 gap-16">
                <div>
                    <span class="text-[#ff6b6b] text-sm uppercase tracking-wider">Contact</span>
                    <h2 class="text-4xl font-bold mt-2 mb-8 dark:text-white text-gradient">Let's create together</h2>
                    <p class="dark:text-zinc-400 text-gray-700 mb-8">
                        Have a project in mind? Let's discuss how we can bring your vision to life.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-[#ff6b6b]/10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#ff6b6b]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <a href="mailto:hello@example.com" class="dark:text-zinc-400 text-white hover:text-white transition-colors">
                                hello@example.com
                            </a>
                        </div>
                    </div>
                </div>
                <form class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm  text-white">Name</label>
                        <input type="text" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-[#ff6b6b] transition-colors">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm  text-white">Email</label>
                        <input type="email" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-[#ff6b6b] transition-colors">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm  text-white">Message</label>
                        <textarea rows="4" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-[#ff6b6b] transition-colors"></textarea>
                    </div>
                    <button class="w-full bg-gradient-to-r from-[#ff6b6b] to-[#ffd93d] text-black font-medium py-3 rounded-lg hover:opacity-90 transition-opacity">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

</x-home-layout>
