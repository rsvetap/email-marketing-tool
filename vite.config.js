import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/admin/css/app.scss',
            'resources/admin/js/app.js',
        ]),
    ],
});
