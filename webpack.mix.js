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
 
 mix.js([
   'resources/js/admin/app.js',
   'node_modules/gentelella/src/js/custom',
   'node_modules/gentelella/src/js/helpers/smartresize'
   ], 'public/js/admin.js')
 .sass('resources/sass/admin.scss', 'public/css/admin.css');

 mix.js([
  'resources/js/produk/app.js',
  ], 'public/js/produk.js')
.sass('resources/sass/produk.scss', 'public/css/produk.css');