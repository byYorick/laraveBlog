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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/pages/assets/css/bootstrap.min.css',
    'resources/pages/assets/css/font-awesome.min.css',
    'resources/pages/assets/css/animate.min.css',
    'resources/pages/assets/css/owl.carousel.css',
    'resources/pages/assets/css/owl.theme.css',
    'resources/pages/assets/css/owl.transitions.css',
    'resources/pages/assets/css/style.css',
    'resources/pages/assets/css/responsive.css'
],
 'public/css/front.css');

mix.scripts([
    'resources/pages/assets/js/html5shiv.js',
    'resources/pages/assets/js/respond.js',
    ],
    'public/css/frontIe9.js');
mix.scripts([
    'resources/pages/assets/js/jquery-1.11.3.min.js',
    'resources/pages/assets/js/bootstrap.min.js',
    'resources/pages/assets/js/owl.carousel.min.js',
    'resources/pages/assets/js/jquery.stickit.min.js',
    'resources/pages/assets/js/menu.js',
    'resources/pages/assets/js/scripts.js'
    ],
    'public/css/front.js');

 mix.copy('resources/pages/assets/images',
     'public/pages/images');
