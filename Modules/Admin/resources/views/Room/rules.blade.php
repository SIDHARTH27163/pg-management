<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container mx-auto mt-2 p-5">
            <x-room-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-ll text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Manage Rooms Rules - Select Room and Add Rules') }}
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
                            action="{{ isset($rule) ? route('admin.manage-room-rules.update', $rule->id) : route('admin.manage-room-rules.store') }}" 
                            method="POST"
                        >
                            @csrf
                            @if (isset($rule))
                                @method('PUT') <!-- Use PUT method for update -->
                            @endif

                            <div class="grid grid-cols-1 gap-3">
                                <!-- Room Selection -->
                                <div>
                                    <x-input-label for="room_id" :value="__('Select Room')" />
                                    <select id="room_id" name="room_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                        <option value="" disabled selected>Select Room</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" {{ isset($rule) && $rule->room_id == $room->id ? 'selected' : '' }}>
                                                {{ $room->room_no }} - {{ $room->room_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
                                </div>
                                
                                
                                <!-- Feature Input -->
                                <div>
                                    <x-input-label for="rule" :value="__('Add Rule')" />
                                    <x-text-input 
                                        id="rule" 
                                        name="rule" 
                                        value="{{ old('rule', $rule->feature ?? '') }}" 
                                        class="block w-full mt-1"
                                    />
                                    <x-input-error :messages="$errors->get('rule')" class="mt-2" />
                                </div>
                            </div>

                            <div class="mt-6">
                                <x-primary-button>
                                    {{ isset($rule) ? __('Update Rule') : __('Add Rule') }}
                                </x-primary-button>
                            </div>
                        </form>
                        
                        {{-- Table to Display Features --}}
                        
                        <div class="my-5">
                            @if(isset($rules) && $rules->isNotEmpty())
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
                                        @foreach($rules as $rule)
                                            <tr>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $rule->room->room_no ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $rule->room->room_type ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $rule->rule }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    <a 
                                                        href="{{ route('admin.manage-room-rules.edit', $rule->id) }}" 
                                                        class="text-blue-600"
                                                    >
                                                        Edit
                                                    </a>
                                                    <form 
                                                        action="{{ route('admin.manage-room-rules.destroy', $rule->id) }}" 
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
