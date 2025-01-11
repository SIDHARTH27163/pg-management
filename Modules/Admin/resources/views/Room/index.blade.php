<x-admin-layout>
  
  


    <section class="max-w-7xl mx-auto p-1 ">
      
      
      <div class="container mx-auto mt-2 p-5 ">
        <x-room-layout>
          <x-slot name="header">
            <h2 class="font-semibold text-ll text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manage Rooms') }}
            </h2>
        </x-slot>
        <div class="mt-2  p-1">

        <div class="max-w-3/4 mx-auto p-4">
            {{-- form started  --}}
           <div class="w-full">
            @if (session('success'))
            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ isset($room) ? route('admin.manage-rooms.update', $room->id) : route('admin.manage-rooms.store') }}" method="POST">
            @csrf
            @if (isset($room))
                @method('PUT') <!-- Use PUT method for update -->
            @endif
        
            <div class="grid grid-cols-2 gap-3">
                <!-- Room Type -->
                <div>
                    <x-input-label for="room_type" :value="__('Room Type')" />
                    <x-text-input id="room_type" class="block mt-1 w-full" type="text" name="room_type" :value="old('room_type', $room->room_type ?? '')" autofocus />
                    <x-input-error :messages="$errors->get('room_type')" class="mt-2" />
                </div>
                
                <!-- Number of Rooms -->
                <div>
                    <x-input-label for="number_of_tenants" :value="__('Number of Tenants')" />
                    <x-text-input id="number_of_tenants" class="block mt-1 w-full" type="text" name="number_of_tenants" :value="old('number_of_tenants', $room->number_of_tenants ?? '')" />
                    <x-input-error :messages="$errors->get('number_of_tenants')" class="mt-2" />
                </div>
                
                <!-- Bathrooms -->
                <div>
                    <x-input-label for="bathroom" :value="__('Bathrooms')" />
                    <x-select-box 
                        id="bathroom" 
                        name="bathroom" 
                        :options="['1' => 'Yes', '0' => 'No']" 
                        :selected="old('bathroom', $room->bathroom ?? '')" 
                        placeholder="Select Bathroom Availability" 
                    />
                    <x-input-error :messages="$errors->get('bathroom')" class="mt-2" />
                </div>
                
                <!-- Balconies -->
                <div>
                    <x-input-label for="balconies" :value="__('Balconies')" />
                    <x-select-box 
                        id="balconies" 
                        name="balconies" 
                        :options="['1' => 'Yes', '0' => 'No']" 
                        :selected="old('balconies', $room->balconies ?? '')" 
                        placeholder="Select Balcony Availability" 
                    />
                    <x-input-error :messages="$errors->get('balconies')" class="mt-2" />
                </div>
                
                <!-- Capacity -->
                <div>
                    <x-input-label for="capacity" :value="__('Capacity')" />
                    <x-text-input id="capacity" class="block mt-1 w-full" type="text" name="capacity" :value="old('capacity', $room->capacity ?? '')" />
                    <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                </div>
                
                <!-- Rent -->
                <div>
                    <x-input-label for="rent" :value="__('Rent')" />
                    <x-text-input id="rent" class="block mt-1 w-full" type="text" step="0.01" name="rent" :value="old('rent', $room->rent ?? '')" />
                    <x-input-error :messages="$errors->get('rent')" class="mt-2" />
                </div>
                
                <!-- Additional Charges -->
                <div>
                    <x-input-label for="additional_charges" :value="__('Additional Charges')" />
                    <x-textarea id="additional_charges" name="additional_charges" :value="old('additional_charges', $room->additional_charges ?? '')" />
                    <x-input-error :messages="$errors->get('additional_charges')" class="mt-2" />
                </div>
                
                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea id="description" name="description" :value="old('description', $room->description ?? '')" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>
            
            <div class="mt-6">
                <x-primary-button>{{ isset($room) ? __('Update Room') : __('Add Room') }}</x-primary-button>
            </div>
        </form>
        
            

           </div>
           {{-- form ended --}}
           <div class="my-5">
            @if(isset($rooms) && $rooms->isNotEmpty())
   
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Room No</th>
                        <th class="px-4 py-2 border">Room Type</th>
                        <th class="px-4 py-2 border">Number of Tenants</th>
                        <th class="px-4 py-2 border">Bathrooms</th>
                        <th class="px-4 py-2 border">Balconies</th>
                        <th class="px-4 py-2 border">Capacity</th>
                        <th class="px-4 py-2 border">Rent</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td class="px-4 py-2 border text-center">{{ $room->room_no }}</td>
                            <td class="px-4 py-2 border text-center">{{ $room->room_type }}</td>
                            <td class="px-4 py-2 border text-center">{{ $room->number_of_tenants }}</td>
                            <td class="px-4 py-2 border text-center">{{ $room->bathroom }}</td>
                            <td class="px-4 py-2 border text-center">{{ $room->balconies }}</td>
                            <td class="px-4 py-2 border text-center">{{ $room->capacity }}</td>
                            <td class="px-4 py-2 border text-center">{{ $room->rent }}</td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('admin.manage-rooms.edit', $room->id) }}" class="text-blue-600">Edit</a>
                                <form action="{{ route('admin.manage-rooms.destroy', $room->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
            @else
                <p>No rooms available.</p>
            @endif
           </div>
           {{-- table --}}
           </div>
          </div>
        </div>
        </x-room-layout>
        
     </div>
    
      </section>
</x-admin-layout>
