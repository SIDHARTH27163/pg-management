<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container mx-auto mt-2 p-5">
            <x-reports-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Room Reports') }}
                    </h2>
                </x-slot>

                <div class="overflow-x-auto bg-white shadow-md rounded-lg my-5 p-5">
                    @if (session('success'))
                        <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h2 class="text-2xl font-semibold mb-4">Hey, Here Are Some New Alloted Bookings</h2>
                    
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Tenant Name</th>
                                <th class="px-4 py-2 text-left">Tenant Email</th>
                                <th class="px-4 py-2 text-left">Tenant Phone</th>
                                <th class="px-4 py-2 text-left">Room Status</th>
                                <th class="px-4 py-2 text-left">Room No</th>
                                <th class="px-4 py-2 text-left">Room Type</th>
                                <th class="px-4 py-2 text-left">Rent</th>
                                <th class="px-4 py-2 text-left">Date</th>
                                <th class="px-4 py-2 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $report->id }}</td>
                                    <td class="px-4 py-2">{{ $report->user->name }}</td>
                                    <td class="px-4 py-2">{{ $report->user->email }}</td>
                                    <td class="px-4 py-2">{{ $report->user->phone_no }}</td>
                                    <td class="px-4 py-2">{{ $report->room->status }}</td>
                                    <td class="px-4 py-2">{{ $report->room->room_no }}</td>
                                    <td class="px-4 py-2">{{ $report->room->room_type }}</td>
                                    <td class="px-4 py-2">{{ $report->price }}</td>
                                    <td class="px-1 py-2 ">{{ $report->checkin_date }}</td>
                                    <th class="px-4 py-2 text-left">
                                       
                                        <form action="{{ route('admin.delete_alloted_booking', $report->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">Remove User/Mark Vacant</button>
                                        </form>
                                        
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                  

                </div>
                <div class="overflow-x-auto bg-white shadow-md rounded-lg my-5 p-5">
                    @if (session('success'))
                        <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h2 class="text-2xl font-semibold mb-4">Hey, Here Are Rooms Details</h2>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Room No</th>
                            <th class="px-4 py-2 text-left">Room Type</th>
                            <th class="px-4 py-2 text-left">Total Capacity</th>
                            <th class="px-4 py-2 text-left">Current Tenants</th>
                            <th class="px-4 py-2 text-left">Rent</th>
                            <th class="px-4 py-2 text-left">Room Status</th>
                            <th class="px-4 py-2 text-left">Room Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr class="border-b {{ $room->current_tenants >= $room->number_of_tenants ? 'bg-red-100' : 'bg-green-100' }}">
                                <td class="px-4 py-2">{{ $room->id }}</td>
                                <td class="px-4 py-2">{{ $room->room_no }}</td>
                                <td class="px-4 py-2">{{ $room->room_type }}</td>
                                <td class="px-4 py-2">{{ $room->number_of_tenants }}</td>
                                <td class="px-4 py-2">{{ $room->current_tenants }}</td>
                                <td class="px-4 py-2">{{ $room->rent }}</td>
                                <td class="px-4 py-2">{{ $room->status }}</td>
                                <td class="px-4 py-2">
                                    @if ($room->current_tenants >= $room->number_of_tenants)
                                        <span class="text-red-500 font-bold">Full</span>
                                    @else
                                        <span class="text-green-500 font-bold">Available</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </x-reports-layout>
        </div>
    </section>
</x-admin-layout>
