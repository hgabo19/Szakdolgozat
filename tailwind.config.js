import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "dark-charcoal": "#1C1C1C",
                "secondary-color": "#171616",
                "action-color": "#6320EE",
                "action-hover": "#6f20ee",
                "hover-color": "#2978A0",
                "highlight-color": "#682585",
                "darker-gray": "#212121",
                purple: "#542369",
                "dark-gray": "#333333",
            },
            keyframes: {
                fade_in: {
                    "0%": { opacity: 0 },
                    "100%": { opacity: 1 },
                },
            },
            animation: {
                fade_in: "fade_in 2s ease-in-out",
            },
        },
    },

    plugins: [forms],
};
