const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/admin/assets/bootstrap/css/bootstrap.min.css',
    'resources/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/admin/assets/ionicons/2.0.1/css/ionicons.min.css',
    'resources/admin/assets/dist/css/AdminLTE.min.css',
    'resources/admin/assets/dist/css/skins/_all-skins.min.css'
], 'public/css/admin.css');

mix.scripts([
    'resources/admin/assets/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/admin/assets/bootstrap/js/bootstrap.min.js',
    'resources/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/admin/assets/plugins/fastclick/fastclick.js',
    'resources/admin/assets/dist/js/app.min.js',
    'resources/admin/assets/dist/js/demo.js'
], 'public/js/admin.js');

mix.copy('resources/admin/assets/bootstrap/fonts', 'public/fonts');
mix.copy('resources/admin/assets/dist/fonts', 'public/fonts');
mix.copy('resources/admin/assets/dist/img', 'public/img');
