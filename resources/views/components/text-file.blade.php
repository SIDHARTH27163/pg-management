@props(['multiple' => false, 'accept' => 'image/*'])

<div class="flex flex-col items-center justify-center w-full p-4 bg-gray-200 rounded-md">
    <label for="{{ $attributes->get('id', 'dropzone-file') }}" 
           class="flex flex-col items-center justify-center py-4 w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input 
            id="{{ $attributes->get('id', 'dropzone-file') }}" 
            name="{{ $attributes->get('name', 'files[]') }}" 
            type="file" 
            class="hidden" 
            {{ $multiple ? 'multiple' : '' }} 
            accept="{{ $accept }}" 
            onchange="previewImage(event, '{{ $attributes->get('id', 'dropzone-file') }}-preview')"
        />
    </label>
    
    <!-- Preview Container -->
    <div id="{{ $attributes->get('id', 'dropzone-file') }}-preview" 
         class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4 w-full">
    </div>
</div>

<script>
    function previewImage(event, previewContainerId) {
        const input = event.target;
        const previewContainer = document.getElementById(previewContainerId);

        // Clear the previous previews
        previewContainer.innerHTML = '';

        if (input.files) {
            Array.from(input.files).forEach(file => {
                if (!file.type.startsWith('image/')) {
                    return; // Skip non-image files
                }

                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create image wrapper
                    const imageWrapper = document.createElement('div');
                    imageWrapper.classList.add('relative', 'aspect-w-4', 'aspect-h-3', 'rounded-lg', 'overflow-hidden', 'shadow');

                    // Create image element
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Preview';
                    img.classList.add('h-full', 'w-full', 'object-cover');

                    // Append the image to the wrapper
                    imageWrapper.appendChild(img);
                    previewContainer.appendChild(imageWrapper);
                };

                reader.readAsDataURL(file);
            });
        }
    }
</script>
