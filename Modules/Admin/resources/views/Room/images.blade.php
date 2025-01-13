<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container mx-auto mt-2 p-5">
            <x-room-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-ll text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Manage Rooms Images - Select Room and Add Images') }}
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
                            action="{{ route('admin.manage-room-images.store') }}" 
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf <!-- Always include CSRF token for security -->

                            <div class="grid grid-cols-1 gap-3">
                                <!-- Room Selection -->
                                <div>
                                    <x-input-label for="room_id" :value="__('Select Room')" />
                                    <select id="room_id" name="room_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                        <option value="" disabled selected>Select Room</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}">
                                                {{ $room->room_no }} - {{ $room->room_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
                                </div>

                                <!-- Cover Image Input -->
                                <div>
                                    <x-input-label for="cover-image" :value="__('Add Cover Image')" />
                                    <x-text-file 
                                        id="cover-image"
                                        name="cover_image"
                                    />
                                    <x-input-error :messages="$errors->get('cover_image')" class="mt-2" />
                                </div>

                                <!-- Gallery Images Input -->
                                <div>
                                    <x-input-label for="gallery-image" :value="__('Add Gallery')" />
                                    <x-text-file 
                                        id="gallery-image"
                                        name="gallery[]"
                                        multiple="true"
                                    />
                                    <x-input-error :messages="$errors->get('gallery')" class="mt-2" />
                                        @foreach ($errors->get('gallery.*') as $key => $messages)
                                            @foreach ($messages as $message)
                                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                            @endforeach
                                        @endforeach
                                        
                                </div>
                            </div>

                            <div class="mt-6">
                                <x-primary-button>
                                    {{ __('Upload Images') }}
                                </x-primary-button>
                            </div>
                        </form>

                        
                        {{-- Table to Display Features --}}
                        
                        <div class="my-5">
                            @if(isset($rooms) && $rooms->isNotEmpty())
                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 border">Room No</th>
                                        <th class="px-4 py-2 border">Room Type</th>
                                        <th class="px-4 py-2 border">Cover Image</th>
                                        <th class="px-4 py-2 border">Gallery Images</th>
                                        <th class="px-4 py-2 border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rooms as $room)
                                        <tr>
                                            <td class="px-4 py-2 border text-center">
                                                {{ $room->room_no }}
                                            </td>
                                            <td class="px-4 py-2 border text-center">
                                                {{ $room->room_type }}
                                            </td>
                                            <td class="px-4 py-2 border text-center">
                                                @if($room->cover_images->isNotEmpty())
                                                    @foreach($room->cover_images as $coverImage)
                                                        <img src="{{ $coverImage->cover_image_path }}" class="h-32 w-32 object-cover inline-block mb-2" />
                                                    @endforeach
                                                @else
                                                    <span class="text-gray-500">No Cover Image</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 border text-center">
                                                @if($room->gallery_images->isNotEmpty())
                                                    @foreach($room->gallery_images as $galleryImage)
                                                        <img src="{{ $galleryImage->gallery_image_path }}" class="h-32 w-32 object-cover inline-block mb-2" />
                                                    @endforeach
                                                @else
                                                    <span class="text-gray-500">No Gallery Images</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 border text-center">
                                                <form 
                                                    action="{{ route('admin.manage-room-images.destroy', $room->id) }}" 
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
                            <p>No rooms available.</p>
                        @endif

                        </div>
                        
                    </div>
                </div>
            </x-room-layout>
        </div>
    </section>
</x-admin-layout>
