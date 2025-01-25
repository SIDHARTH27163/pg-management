<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container relative z-40 mx-auto mt-2 p-5">
            <!-- Not-Approved Bookings Table -->
           
            <div class="overflow-x-auto bg-white shadow-md rounded-lg my-5 p-5">
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
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">View</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $notApprovedBookings->links() }}
                </div>
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
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md">View</button>
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
</x-admin-layout>
