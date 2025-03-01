<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report An Issue') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl mx-auto  p-2">
        <div class="max-w-3/4 mx-auto p-4">
            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form for Add/Update --}}
            <form action="{{ route('user.report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
             
            
                <!-- Aadhar Card Photo Upload -->
                
            
                <!-- Home Address -->
                <div>
                    <x-input-label for="report_title" :value="__('Report Title ')" />
                    <x-text-input 
                        id="report_title" 
                        name="title" 
                        placeholder="Enter Isuue Title"
                       
                        class="block w-full mt-1"
                    />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
            
                <!-- Description (Text Editor) -->
                <div class="col-span-2">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-texteditor 
                        id="description" 
                        name="description" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                       
                    />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            
                <div class="mt-6">
                    <x-primary-button>
                        {{ __('Submit ') }}
                    </x-primary-button>
                </div>
            </form>
            
            
        </div>
        <div class="mt-5 p-4">
            <div class="my-5">
                @if(isset($reports) && $reports->isNotEmpty())
       
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Decsription</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td class="px-4 py-2 border text-center">{{ $report->status }}</td>
                                <td class="px-4 py-2 border text-center">{{ $report->title }}</td>
                                <td class="px-4 py-2 border text-justify">{!! $report->description !!}</td>

                               
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
</x-app-layout>