<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container mx-auto mt-2 p-5">
           
                <x-slot name="header">
                    <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Reports') }}
                    </h2>
                </x-slot>

                <div class="overflow-x-auto bg-white shadow-md rounded-lg my-5 p-5">
                    @if (session('success'))
                        <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h2 class="text-2xl font-semibold mb-4">Hey, Here Are Some New Reports</h2>
                    
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Title</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-left">Date</th>
                                <th class="px-4 py-2 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $report->id }}</td>
                                    <td class="px-4 py-2">{{ $report->status }}</td>
                                    <td class="px-4 py-2">{{ $report->title }}</td>
                                    <td class="px-4 py-2 ">{!! $report->description !!}</td>
                                    <td class="px-4 py-2 ">{{ $report->created_at->format('d-m-Y') }}</td>
                                    <th class="px-4 py-2 text-left">
                                       
                                        <form action="{{ route('admin.report_status', $report->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-red-600">Change Status</button>
                                        </form>
                                        
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
           
        </div>
    </section>
</x-admin-layout>
