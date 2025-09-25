import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                fredoka: ["Fredoka", "sans-serif"],
                roboto: ["Roboto", "sans-serif"],
            },

            colors: {
                'color-primary': '#06923E',
                'color-secondary': '#559CF7',
                'color-cloudwhite': '#FDFDFD',
                'color-yellow': '#FEF3C7',
                'color-brown': '#8D6E63',
                'color-gray': '#D9D9D9',
                'color-dark': '#111827',
                'color-darkSecondary': '#1F2937',
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
