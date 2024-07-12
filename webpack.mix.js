const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/admin/app.js', 'public/admin/js')
    .js('resources/js/front/app.js', 'public/front/js')
    .sass('resources/sass/admin/app.scss', 'public/admin/css')
    .sass('resources/sass/front/app.scss', 'public/front/css')
    .sourceMaps()
    .version();
