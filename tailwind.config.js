module.exports = {
	darkMode: 'class',
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/**/*.blade.php',
		'./resources/**/*.js',
		'./resources/**/*.vue',
	],
	theme: {
    extend: {
        fontFamily: {
            sans: ['Bahij TheSansArabic', 'Figtree', ...require('tailwindcss/defaultTheme').fontFamily.sans],
            bahij: ['Bahij TheSansArabic', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        },
        colors: {
            testcolor: '#ff0000',
            // كسب brand palette (8 colors)
            brand: {
                dark: '#1E4A33',
                forest: '#2F6B4A',
                muted: '#63AF7D',
                pale: '#8ECB9E',
                offwhite: '#D8F1E5',
                black: '#000000',
            },
            }
        }
    },
	plugins: [
		require('tailwindcss-rtl'),
		require('@tailwindcss/forms'),
	],
}
