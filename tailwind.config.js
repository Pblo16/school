import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',
    content: [
        'node_modules/preline/dist/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.zinc,

                secondary: colors.zinc,

                positive: colors.emerald,

                negative: colors.red,

                warning: colors.red,

                info: colors.blue,

                background: {
                    dark: colors.zinc, // You can change zinc to any color and adjust the shade
                    light: colors.white
                }
            },
        },
    },

    plugins: [forms, typography, require('preline/plugin')],
};
