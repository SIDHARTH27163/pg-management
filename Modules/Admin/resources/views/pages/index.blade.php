<x-admin-layout>
    <section class="max-w-7xl mx-auto p-1">
        <div class="container mx-auto mt-2 p-5">
           
                <x-slot name="header">
                    <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Manage Pages - Create, Edit, and List Pages') }}
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
                            action="{{ isset($pageToEdit) ? route('admin.pages.update', $pageToEdit->id) : route('admin.pages.store') }}" 
                            method="POST"
                        >
                            @csrf
                            @if (isset($pageToEdit))
                                @method('PUT') <!-- Use PUT method for update -->
                            @endif

                            <div class="grid grid-cols-1 gap-3">
                                <!-- Title Input -->
                                <div>
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input 
                                        id="title" 
                                        name="title" 
                                        value="{{ old('title', $pageToEdit->title ?? '') }}" 
                                        class="block w-full mt-1"
                                    />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <!-- Slug Input -->
                                <div>
                                    <x-input-label for="slug" :value="__('Slug')" />
                                    <x-text-input 
                                        id="slug" 
                                        name="slug" 
                                        value="{{ old('slug', $pageToEdit->slug ?? '') }}" 
                                        class="block w-full mt-1"
                                    />
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                </div>

                                <!-- Content Input -->
                                <div>
                                    <x-input-label for="content" :value="__('Content')" />
                                    
                                   
                                       
                                        <x-texteditor 
                                        id="content" 
                                        name="content" 
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                        value="{{ is_array(old('content', $pageToEdit->content ?? '')) ? '' : old('content', $pageToEdit->content ?? '') }}" 
                                    />
                                    
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>
                            </div>

                            <div class="mt-3">
                                <x-primary-button>
                                    {{ isset($pageToEdit) ? __('Update Page') : __('Create Page') }}
                                </x-primary-button>
                            </div>
                        </form>

                        {{-- Table to Display Pages --}}
                        <div class="my-5">
                            @if($pages->isNotEmpty())
                                <table class="min-w-full table-auto border-collapse border border-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 border">Title</th>
                                            <th class="px-4 py-2 border">Slug</th>
                                            <th class="px-4 py-2 border">Content</th>
                                            <th class="px-4 py-2 border">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages as $page)
                                            <tr>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $page->title }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $page->slug }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    {{ $page->content }}
                                                </td>
                                                <td class="px-4 py-2 border text-center">
                                                    <a 
                                                        href="{{ route('admin.pages.index', ['edit' => $page->id]) }}" 
                                                        class="text-blue-600"
                                                    >
                                                        Edit
                                                    </a>
                                                    <form 
                                                        action="{{ route('admin.pages.destroy', $page->id) }}" 
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
                                <p class="text-center">No pages available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
</x-admin-layout>
