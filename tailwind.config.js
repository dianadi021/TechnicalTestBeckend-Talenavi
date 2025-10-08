import defaultTheme from "tailwindcss/defaultTheme";
import colors from "@tailwindcss/colors";
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
                // Blue
                primary: {
                    DEFAULT: "#4e73df",
                    light: "#5a86e5",
                    dark: "#3c5bb5",
                },
                // Green
                success: {
                    DEFAULT: "#198754",
                    light: "#23a062",
                    dark: "#146c43",
                },
                // Light Blue
                info: {
                    DEFAULT: "#36b9cc",
                    light: "#4fc8da",
                    dark: "#2a93a2",
                },
                // Yellow
                warning: {
                    DEFAULT: "#f6c23e",
                    light: "#f8d267",
                    dark: "#d4a533",
                },
                // Red
                danger: {
                    DEFAULT: "#e74a3b",
                    light: "#ee5c4c",
                    dark: "#c83f35",
                },
            },
        },
    },

    plugins: [forms],
};
