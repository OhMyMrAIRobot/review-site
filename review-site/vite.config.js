import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(
            {
                input: [
                    'resources/css/admin.css',
                    'resources/css/adminCategory.css',
                    'resources/css/adminShop.css',
                    'resources/css/adminUsers.css',
                    'resources/css/footer.css',
                    'resources/css/header.css',
                    'resources/css/lastReviews.css',
                    'resources/css/main.css',
                    'resources/css/register.css',
                    'resources/css/reviewsAdmin.css',
                    'resources/css/shop.css',
                    'resources/css/shopPage.css',
                    'resources/css/sidebar.css',
                    'resources/css/style.css',
                ],
                refresh: true,
            }),
    ],
});
