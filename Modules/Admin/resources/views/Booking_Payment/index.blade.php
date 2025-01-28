<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container relative z-40 mx-auto mt-2 p-5">
            <!-- Not-Approved Bookings Table -->
           
            <div class="overflow-x-auto bg-white shadow-md rounded-lg my-5 p-5">
                @if (session('success'))
                <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                    {{ session('success') }}
                </div>
            @endif
                <h2 class="text-2xl font-semibold mb-4">Hey Here Are Some New Rquests</h2>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Booking ID</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Phone No</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notApprovedBookings as $booking)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $booking->id }}</td>
                                <td class="px-4 py-2">{{ $booking->name }}</td>
                                <td class="px-4 py-2">{{ $booking->email }}</td>
                                <td class="px-4 py-2">{{ $booking->phone }}</td>
                                <td class="px-4 py-2 text-green-600">{{ $booking->status }}</td>
                                <td class="px-4 py-2">
                                    <!-- Add action buttons (e.g., View or Cancel) -->
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Remove</button>
                                    <button
                                    onclick="openModal({{ $booking->id }})"
                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                    Approve
                                </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $notApprovedBookings->links() }}
                </div>
                {{-- modal --}}
                <div id="modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-75 flex justify-center items-center">
                    <div class="bg-white rounded-lg p-6 w-1/2">
                        <h2 class="text-lg font-semibold mb-4">Approve Booking</h2>
                        <form action="{{ route('admin.approve.booking') }}" method="POST">
                            @csrf
                            <input type="hidden" name="booking_id" id="booking_id">
                            <x-input-label for="room_id" :value="__('Select Room')" />
                                   <div class="my-2">
                                    <select id="room_id" name="room_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                        <option value="" disabled selected>Select Room</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" {{ isset($feature) && $feature->room_id == $room->id ? 'selected' : '' }}>
                                                {{ $room->room_no }} - {{ $room->room_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                   </div>


                            <label for="checkin_date">Check-In Date:</label>
                            <input type="date" name="checkin_date" class="w-full mb-4" required>
                
                            <label for="price">Price:</label>
                            <input type="number" name="price" class="w-full mb-4" required>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Approve</button>
                            <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                        </form>
                    </div>
                </div>
                {{-- modal ends  --}}
            </div>

            <!-- Approved Bookings Table -->
          
            <div class="overflow-x-auto bg-white shadow-md rounded-lg my-5 p-5">
                <h2 class="text-2xl font-semibold mb-4">Hey Here Are Approced Booking Requests</h2>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Booking ID</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Phone No</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approvedBookings as $booking)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $booking->id }}</td>
                            <td class="px-4 py-2">{{ $booking->name }}</td>
                            <td class="px-4 py-2">{{ $booking->email }}</td>
                            <td class="px-4 py-2">{{ $booking->phone }}</td>
                            <td class="px-4 py-2 text-green-600">{{ $booking->status }}</td>
                            <td class="px-4 py-2">
                                <!-- Add action buttons (e.g., View or Cancel) -->
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Approve</button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Remove</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $approvedBookings->links() }}
                </div>
            </div>
        </div>
    </section>
    {{-- modal script  --}}
   
    
    <script>
        function openModal(bookingId) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('booking_id').value = bookingId;
        }
    
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
    {{-- modal ends --}}
</x-admin-layout>
