import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',  // Only JS entry point
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                // Prevent code splitting
                manualChunks: undefined,
            },
        },
        cssCodeSplit: false, // Combine all CSS into a single file
    },
});
