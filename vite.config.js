import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/tm.css', 'resources/js/tm.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
