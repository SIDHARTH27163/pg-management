import Quill from 'quill';
import 'quill/dist/quill.snow.css';
import '../css/app.css'; // Ensure this imports your Tailwind and custom font styles

document.addEventListener("DOMContentLoaded", function() {
    const editorElements = document.querySelectorAll('[id^="quill-editor-"]');

    editorElements.forEach(element => {
        const editorId = element.id.replace('quill-editor-', '');
        const quill = new Quill(`#quill-editor-${editorId}`, {
            theme: 'snow',
            modules: {
                toolbar: [

                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'image', 'code-block']
                ]
            },
            placeholder: 'Compose an epic...',
            readOnly: false,
            formats: ['font', 'header', 'bold', 'italic', 'underline', 'link', 'image', 'code-block']
        });

        // Set initial content if needed
        const initialContent = document.querySelector(`#${editorId}`).value;
        quill.root.innerHTML = initialContent;

        // Sync textarea content with Quill editor
        quill.on('text-change', function() {
            document.getElementById(editorId).value = quill.root.innerHTML;
        });

        // Image upload handler
        quill.getModule('toolbar').addHandler('image', function() {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = async function() {
                const file = input.files[0];
                if (!file) return;

                const formData = new FormData();
                formData.append('image', file);

                try {
                    const response = await fetch('/upload', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Failed to upload image');
                    }

                    const data = await response.json();
                    const url = data.url;

                    // Insert the image into the editor
                    const range = quill.getSelection();
                    quill.insertEmbed(range.index, 'image', url);
                } catch (error) {
                    console.error('Error uploading image:', error);
                }
            };
        });
    });
});