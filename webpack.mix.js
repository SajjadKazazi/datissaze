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


mix.styles([

    'resources/css/admin/assets/core.css',
    'resources/css/admin/assets/preloader.min.css',
    'resources/css/admin/assets/icons.min.css',
    'resources/css/admin/assets/simplebar.min.css',
    'resources/css/admin/assets/app-rtl.min.css',
    'resources/css/admin/assets/flatpickr.min.css',
    'resources/css/admin/assets/flag-icon.min.css',
    'resources/css/admin/assets/style-rtl.min.css',
    'resources/css/admin/assets/bootstrap-rtl.min.css',


], 'public/css/admin.css')

.styles([

    'resources/css/app.css'

], 'public/css/app.css');


mix.scripts([
    'resources/js/admin/assets/jquery.min.js',
    'resources/js/admin/assets/bootstrap.bundle.min.js',
    'resources/js/admin/assets/metisMenu.min.js',
    'resources/js/admin/assets/simplebar.min.js',
    'resources/js/admin/assets/pace.min.js',
    'resources/js/admin/assets/flatpickr.min.js',
    'resources/js/admin/assets/apexcharts.min.js',
    'resources/js/admin/assets/dashboard-light.js',
    'resources/js/admin/assets/feather.min.js',
    'resources/js/admin/assets/template.js',
    'resources/js/admin/assets/app.js',


], 'public/js/admin.js')

    .scripts([
        'resources/js/app.js'

    ], 'public/js/app.js')
    .version();
