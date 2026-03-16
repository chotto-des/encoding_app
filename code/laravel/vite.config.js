import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/login.css', 'resources/css/register.css', 'resources/css/site_header.css', 'resources/css/studentpage.css', 'resources/css/home_dashboard.css', 'resources/css/add_student.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
