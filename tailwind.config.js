import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/PowerGridThemes/TealNeumorphTheme.php",
    ],

    theme: {
        extend: {
            colors: {
                teal: {
                    DEFAULT: "#d7e4f8",
                    50: "#f0f9f9",
                    100: "#d7e4f8",
                    200: "#a5c4f2",
                    500: "#3b82f6",
                    700: "#1d4ed8",
                },
                cyan: {
                    40: "#C9D8EC",
                },
                brand: {
                    DEFAULT: "#6488BF",
                    20: "#506d99",
                },
                inputbg: "rgba(201,216,236,0.6)",
                greenStart: "#10B981",
                greenEnd: "#059669",
                orangeStart: "#F97316",
                orangeEnd: "#EA580C",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                popout: "-6px -6px 12px rgba(255,255,255,0.4), 6px 6px 12px rgba(194,210,235,0.6)",
                insetpop:
                    "inset -2px -2px 4px rgba(255,255,255,0.5), inset 2px 2px 4px #97A9C4",
            },
        },
    },

    plugins: [forms],
};
