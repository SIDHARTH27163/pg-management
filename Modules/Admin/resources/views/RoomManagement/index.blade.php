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
        <div class="max-w-3/4 mx-auto p-2">
          <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Room No</th>
                    <th class="px-4 py-2 border">Room Type</th>
                    <th class="px-4 py-2 border">Features</th>
                    <th class="px-4 py-2 border">Rules</th>
                    <th class="px-4 py-2 border">Cover Images</th>
                    <th class="px-4 py-2 border">Gallery Images</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $room->room_no }}</td>
                    <td class="px-4 py-2 border text-center">{{ $room->room_type }}</td>
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
                    <td class="px-4 py-2 border text-center">
                        <ul>
                            @foreach($room->cover_images as $image)
                            <li><img src="{{ $image->cover_image_path }}" alt="Cover Image" class="h-20 w-20 object-cover"></li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <ul class="flex space-x-2">
                            @foreach($room->gallery_images as $galleryImage)
                            <li>
                                <img src="{{ $galleryImage->gallery_image_path }}" alt="Gallery Image" class="h-20 w-20 object-cover">
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

           </div>
          </div>
        </div>
        </x-room-layout>
        
     </div>
    
      </section>
</x-admin-layout>
