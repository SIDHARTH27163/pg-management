import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import FullReload from 'vite-plugin-full-reload';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css' ,'resources/css/card.css','resources/css/comon.css' , 'resources/css/crousel.css','resources/js/crousel.js', 'resources/js/app.js' ,'resources/js/editor.js'],
            refresh: true,
        }),
        FullReload([
            'resources/views/**/*.blade.php',
            'Modules/**/resources/views/**/*.blade.php', // Watch Blade files in modules
        ]),
    ],
});
