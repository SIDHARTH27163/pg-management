<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container mx-auto mt-2 p-5">
            <x-room-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Manage Rooms') }}
                    </h2>
                </x-slot>
                <div class="mt-2 p-1">
                    <div class="max-w-3/4 mx-auto p-2 overflow-x-auto ">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2 border">Room No</th>
                                    <th class="px-4 py-2 border">Room Type</th>
                                    <th class="px-4 py-2 border">Total Capacity</th>
                                    <th class="px-4 py-2 border">Current Tenants</th>
                                    <th class="px-4 py-2 border">Availability</th>
                                    <th class="px-4 py-2 border">Features</th>
                                    <th class="px-4 py-2 border">Rules</th>
                                  
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    @foreach($room->allottedBookings as $booking)
                                        <tr class="border-b">
                                            <td class="px-4 py-2 border text-center">{{ $room->room_no }}</td>
                                            <td class="px-4 py-2 border text-center">{{ $room->room_type }}</td>
                                            <td class="px-4 py-2 border text-center">{{ $room->number_of_tenants }}</td>
                                            <td class="px-4 py-2 border text-center">{{ $room->current_tenants }}</td>
                                            <td class="px-4 py-2 border text-center">
                                                @if($room->current_tenants >= $room->number_of_tenants)
                                                    <span class="text-red-500 font-bold">Full</span>
                                                @else
                                                    <span class="text-green-500 font-bold">Available</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 border">
                                                <ul>
                                                    @foreach($room->features as $feature)
                                                        <li>{{ $feature->feature }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="px-4 py-2 border">
                                                <ul>
                                                    @foreach($room->rules as $rule)
                                                        <li>{{ $rule->rule }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            
                                           
                                           
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-room-layout>
        </div>
    </section>
</x-admin-layout>
