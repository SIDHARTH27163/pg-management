<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Complete Profile Here') }}
        </h2>
    </x-slot>
    <div class="">
        <div class="max-w-3/4 mx-auto p-4">
            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form for Add/Update --}}
            <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="grid grid-cols-2 gap-3">
                    <!-- Father's Name -->
                    <div>
                        <x-input-label for="father_name" :value="__('Father\'s Name')" />
                        <x-text-input 
                            id="father_name" 
                            name="father_name" 
                            placeholder="Enter father's full name"
                            value="{{ old('father_name') }}" 
                            class="block w-full mt-1"
                        />
                        <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
                    </div>
            
                    <!-- Father's Contact Number -->
                    <div>
                        <x-input-label for="father_contact" :value="__('Father\'s Contact Number')" />
                        <x-text-input 
                            id="father_contact" 
                            type="tel"
                            name="father_contact" 
                            placeholder="Enter father's contact number"
                            value="{{ old('father_contact') }}" 
                            class="block w-full mt-1"
                        />
                        <x-input-error :messages="$errors->get('father_contact')" class="mt-2" />
                    </div>
                </div>
            
                <!-- Aadhar Card Photo Upload -->
                <div>
                    <div>
                        <x-input-label for="aadhar_card" :value="__('Add Aadhar Card Image')" />
                        <x-text-file 
                            id="aadhar_card"
                            name="aadhar_card"
                        />
                        <x-input-error :messages="$errors->get('aadhar_card')" class="mt-2" />
                    </div>
                </div>
            
                <!-- Home Address -->
                <div>
                    <x-input-label for="home_address" :value="__('Home Address')" />
                    <x-text-input 
                        id="home_address" 
                        name="home_address" 
                        placeholder="Enter full home address"
                        value="{{ old('home_address') }}" 
                        class="block w-full mt-1"
                    />
                    <x-input-error :messages="$errors->get('home_address')" class="mt-2" />
                </div>
            
                <!-- Description (Text Editor) -->
                <div class="col-span-2">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-texteditor 
                        id="description" 
                        name="description" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                        value="{{ old('description') }}" 
                    />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            
                <div class="mt-6">
                    <x-primary-button>
                        {{ isset($feature) ? __('Update Details') : __('Add Details') }}
                    </x-primary-button>
                </div>
            </form>
            
            
        </div>
    </div>
</x-app-layout>