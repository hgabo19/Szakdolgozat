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
                fade_in_left: {
                    "0%": {
                        opacity: "0",
                        transform: "translateX(-30px) ",
                    },
                    "100%": {
                        opacity: 1,
                        transform: "translateX(0px) ",
                    },
                },
                fade_in_right: {
                    "0%": {
                        opacity: "0",
                        transform: "translateX(30px) ",
                    },
                    "100%": {
                        opacity: 1,
                        transform: "translateX(0px) ",
                    },
                },
                fade_in_up: {
                    "0%": {
                        opacity: "0",
                        transform: "translateY(30px) ",
                    },
                    "100%": {
                        opacity: 1,
                        transform: "translateY(0px) ",
                    },
                },
                fade_in_down: {
                    "0%": {
                        opacity: "0",
                        transform: "translateY(-30px) scale(0.9)",
                    },
                    "100%": {
                        opacity: 1,
                        transform: "translateY(0px) scale(1)",
                    },
                },
            },
            animation: {
                fade_in_left: "fade_in_left 2s ease-in-out",
                fade_in_right: "fade_in_right 1s ease-in-out",
                fade_in_up: "fade_in_up 1s ease-in-out",
                fade_in_down: "fade_in_down 1s ease-in-out",
            },
        },
    },

    plugins: [forms],
};
