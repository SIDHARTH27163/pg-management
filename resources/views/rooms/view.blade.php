<x-home-layout>
    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4 py-2">
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
        <div class="max-w-7xl mx-auto p-6 dark:text-white space-y-8">
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- Room Header -->
            <div class="flex flex-col lg:flex-row items-center justify-between border-b border-gray-700 pb-4 gap-4">
                <div class="tracking-tight text-gray-900 dark:text-gray-100 flex flex-col">
                    <div class="font-normal text-xl">Room no: <span class="font-bold text-2xl">{{ $room->room_no }}</span></div>
                    <div class="font-normal text-xl">Room Type: <span class="font-bold text-2xl">{{ ucfirst($room->room_type) }}</span></div>
                </div>
                <div class="flex items-center justify-center lg:w-1/4 md:w-1/4">
                    <img src="{{ $room->cover_images[0]['cover_image_path'] }}" alt="Room Image" class="transition-transform transform hover:scale-105 duration-300">
                </div>
                <div class="">
                    <p class="text-xl font-semibold px-4 py-2 rounded-lg shadow transition-transform transform hover:scale-105 duration-300">
                        Status:
                        <span class="{{ $room->status === 'active' ? 'text-green-400' : 'text-red-400' }}">
                            {{ ucfirst($room->status) }}
                        </span>
                    </p>
                    <div class="flex justify-center mt-6">
                        <button id="bookNowBtn" class="px-6 py-3 text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring-4 focus:ring-rose-300">
                            Enquire Now
                        </button>
                    </div>
                </div>
    
            </div>

            <!-- Booking Button -->
          
            <!-- Room Details -->
            <div>
                <div class="w-full">
                    <p class="text-2xl font-medium text-gray-900 dark:text-gray-200">Description:</p>
                    <p class="text-gray-800 dark:text-gray-300 text-justify tracking-tight leading-7 text-lg">
                        {{ strip_tags($room->description) }}
                    </p>
                </div>
                <div class="my-5">
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-200">Additional Charges:</p>
                    <p class="text-gray-800 dark:text-gray-200">
                        {{ strip_tags($room->additional_charges) }}
                    </p>
                </div>
            </div>

            <!-- Features Section -->
            <div class="w-full p-4 my-2">
                <h2 class="text-2xl font-semibold mb-4 border-b border-gray-700 pb-2 text-gray-900 dark:text-gray-100">Features</h2>
                <div class="flex flex-wrap">
                    @foreach ($room->features as $feature)
                        <span class="text-gray-800 dark:text-gray-200 shadow-lg rounded-lg p-3 mx-2">
                            {{ $feature->feature }}
                        </span>
                    @endforeach
                </div>
            </div>

            <!-- Capacity & Rent Section -->
            <div class="w-full p-4 my-2">
                <h2 class="text-2xl font-semibold mb-4 border-b border-gray-700 pb-2 text-gray-900 dark:text-gray-100">Capacity & Rent</h2>
                <p class="text-xl font-bold text-gray-900 dark:text-gray-100">
                    Rent: <span class="font-normal">${{ $room->rent }}</span>
                </p>
                <p class="text-xl font-bold text-gray-900 dark:text-gray-100">
                    Capacity: <span class="font-normal">{{ $room->capacity }} tenants</span>
                </p>
            </div>

            <!-- Gallery Section -->
            <div>
                <h2 class="text-2xl font-semibold mb-4 border-b border-gray-700 pb-2 text-gray-900 dark:text-gray-100">Gallery</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($room->gallery_images as $image)
                        <div class="overflow-hidden rounded-lg shadow-lg">
                            <img src="{{ $image->gallery_image_path }}" alt="Room Image" class="transition-transform transform hover:scale-105 duration-300">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-900">Book Your Room</h2>
            <form action="{{ route('book.room') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500">
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="button" id="cancelBtn" class="px-4 py-2 text-gray-500 bg-gray-100 rounded-lg hover:bg-gray-200">
                        Cancel
                    </button>
                    <button type="submit" class="ml-2 px-4 py-2 text-white bg-rose-600 rounded-lg hover:bg-rose-700 focus:ring-rose-300">
                        Confirm Enquiry
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const bookNowBtn = document.getElementById('bookNowBtn');
            const bookingModal = document.getElementById('bookingModal');
            const cancelBtn = document.getElementById('cancelBtn');

            bookNowBtn.addEventListener('click', () => {
                bookingModal.classList.remove('hidden');
            });

            cancelBtn.addEventListener('click', () => {
                bookingModal.classList.add('hidden');
            });
        });
    </script>
</x-home-layout>
