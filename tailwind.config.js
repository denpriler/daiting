const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    experimental: {
        applyComplexClasses: true,
    },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        container: {
            center: true,
            screens: {
                sm: '600px',
                md: '728px',
                lg: '984px',
                xl: '984px',
                '2xl': '984px',
            },
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
