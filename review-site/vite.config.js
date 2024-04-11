import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(
            {
                input: [
                    'resources/css/style.css',
                ],
                refresh: true,
            }),
    ],
    server: {
       // host: '192.168.182.135'
    }
});
