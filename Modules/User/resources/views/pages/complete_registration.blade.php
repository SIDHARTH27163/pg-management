<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Complete Profile Here') }}
        </h2>
    </x-slot>
    <div class="">
        <div class= mx-auto p-4">
            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form for Add/Update --}}
            <form action="{{ route('user.invitation') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="">
                    <div>
                        <x-input-label for="your name " :value="__('Your\'s Name')" />
                        <x-text-input 
                            id="name" 
                            name="name" 
                            placeholder="Enter your full name"
                            value="{{ old('name') }}" 
                            class="block w-full mt-1"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email " :value="__('Email')" />
                        <x-text-input 
                            id="email" 
                            name="email"
                            type="email" 
                            placeholder="Enter your email"
                            value="{{ old('email') }}" 
                            class="block w-full mt-1"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                   
                    <div>
                        <x-input-label for="phone" :value="__(' Contact Number')" />
                        <x-text-input 
                            id="phone" 
                            type="tel"
                            name="phone" 
                            placeholder="Enter your contact number"
                            value="{{ old('phone') }}" 
                            class="block w-full mt-1"
                        />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                </div>
            
                
            
                <div class="mt-6">
                    <x-primary-button>
                        {{ isset($feature) ? __('Complete') : __('Add Details') }}
                    </x-primary-button>
                </div>
            </form>
            
            
        </div>
    </div>

</x-guest-layout>