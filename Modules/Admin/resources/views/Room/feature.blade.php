<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container mx-auto mt-2 p-5">
            <x-room-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-ll text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Manage Rooms Features - Select Room and Add Features') }}
                    </h2>
                </x-slot>
                
                <div class="mt-2 p-1">
                    <div class="max-w-3/4 mx-auto p-4">
                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Form for Add/Update --}}
                        <form 
                            action="{{ isset($roomFeature) ? route('admin.manage-room-features.update', $roomFeature->id) : route('admin.manage-room-features.store') }}" 
                            method="POST"
                        >
                            @csrf
                            @if (isset($roomFeature))
                                @method('PUT') <!-- Use PUT method for update -->
                            @endif

                            <div class="grid grid-cols-1 gap-3">
                                <!-- Room Selection -->
                                <div>
                                    <x-input-label for="room_id" :value="__('Select Room')" />
                                    <select id="room_id" name="room_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                        <option value="" disabled selected>Select Room</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" {{ isset($roomFeature) && $roomFeature->room_id == $room->id ? 'selected' : '' }}>
                                                {{ $room->room_no }} - {{ $room->room_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
                                </div>
                                
                                
                                <!-- Feature Input -->
                                <div>
                                    <x-input-label for="feature" :value="__('Feature')" />
                                    <x-text-input 
                                        id="feature" 
                                        name="feature" 
                                        value="{{ old('feature', $roomFeature->feature ?? '') }}" 
                                        class="block w-full mt-1"
                                    />
                                    <x-input-error :messages="$errors->get('feature')" class="mt-2" />
                                </div>
                            </div>

                            <div class="mt-6">
                                <x-primary-button>
                                    {{ isset($roomFeature) ? __('Update Feature') : __('Add Feature') }}
                                </x-primary-button>
                            </div>
                        </form>
                        
                        {{-- Table to Display Features --}}
                        
                        <div class="my-5">
                            @if(isset($features) && $features->isNotEmpty())
                                <table class="min-w-full table-auto border-collapse border border-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 border">Room No</th>
                                            <th class="px-4 py-2 border">Room Type</th>
                                            <th class="px-4 py-2 border">Feature</th>
                                            <th class="px-4 py-2 border">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($features as $feature)
                                            <tr>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $feature->room->room_no ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $feature->room->room_type ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $feature->feature }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    <a 
                                                        href="{{ route('admin.manage-room-features.edit', $feature->id) }}" 
                                                        class="text-blue-600"
                                                    >
                                                        Edit
                                                    </a>
                                                    <form 
                                                        action="{{ route('admin.manage-room-features.destroy', $feature->id) }}" 
                                                        method="POST" 
                                                        class="inline"
                                                    >
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
                                <p>No features available.</p>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </x-room-layout>
        </div>
    </section>
</x-admin-layout>
