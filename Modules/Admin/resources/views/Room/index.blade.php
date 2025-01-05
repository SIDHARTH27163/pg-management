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
          <form action="{{ route('admin.manage-rooms.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <x-input-label for="room_type" :value="__('Room Type')" />
                    <x-text-input id="room_type" class="block mt-1 w-full" type="text" name="room_type" :value="old('room_type')"  autofocus />
                    <x-input-error :messages="$errors->get('room_type')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="number_of_rooms" :value="__('Number of Rooms')" />
                    <x-text-input id="number_of_rooms" class="block mt-1 w-full" type="number" name="number_of_rooms" :value="old('number_of_rooms')"  />
                    <x-input-error :messages="$errors->get('number_of_rooms')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="bathrooms" :value="__('Bathrooms')" />
                    <x-text-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms" :value="old('bathrooms')"  />
                    <x-input-error :messages="$errors->get('bathrooms')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="balconies" :value="__('Balconies')" />
                    <x-text-input id="balconies" class="block mt-1 w-full" type="number" name="balconies" :value="old('balconies')" />
                    <x-input-error :messages="$errors->get('balconies')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="capacity" :value="__('Capacity')" />
                    <x-text-input id="capacity" class="block mt-1 w-full" type="number" name="capacity" :value="old('capacity')"  />
                    <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="rent" :value="__('Rent')" />
                    <x-text-input id="rent" class="block mt-1 w-full" type="number" step="0.01" name="rent" :value="old('rent')"  />
                    <x-input-error :messages="$errors->get('rent')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="additional_charges" :value="__('Additional Charges')" />
                    <x-textarea id="additional_charges" name="additional_charges" :value="old('additional_charges')"  />
                    <x-input-error :messages="$errors->get('additional_charges')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea id="description" name="description" :value="old('description')"  />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>
            
            <div class="mt-6">
                <x-primary-button>{{ __('Add Room') }}</x-primary-button>
            </div>
        </form>

           </div>
          </div>
        </div>
        </x-room-layout>
        
     </div>
    
      </section>
</x-admin-layout>
