<x-admin-layout>
  
  


    <section class="max-w-7xl mx-auto p-1 ">
      
      
      <div class="container mx-auto mt-2 p-5 ">
        <x-room-layout>
          <x-slot name="header">
            <h2 class="font-semibold text-ll text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manage Users') }}
            </h2>
        </x-slot>

        <div class="mt-2  p-1">
          @if (session('success'))
                            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                                {{ session('success') }}
                            </div>
                        @endif
        <div class="max-w-3/4 mx-auto p-2">
          <form action="{{ route('admin.send_invite') }}" method="POST" class="bg-white shadow-md rounded p-5">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">User Email:</label>
                <input type="email" id="email" name="email"  class="w-full border-gray-300 rounded mt-1 p-2">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 mb-2" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send Invitation</button>
        </form>
          <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $user->status }}</td>
                    <td class="px-4 py-2 border text-center">{{ $user->name }}</td>
                    <td class="px-4 py-2 border text-center">{{ $user->email }}</td>
                    <td class="px-4 py-2 border text-center">{{ $user->created_at }}</td>
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
