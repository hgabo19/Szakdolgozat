import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dark-charcoal': '#1c1c1c',
                'secondary-color': '#171616',
                'active-color': '#42BFDD',
                'hover-color': '#2978A0',
                'highlight-color': '#682585',
                'darker-gray': '#3b3737',
                'purple': '#542369',
                'dark-gray': '#333333',
            },
        },
    },

    plugins: [forms],
};
