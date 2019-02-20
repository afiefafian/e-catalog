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
   'resources/assets/js/app.js',
   'node_modules/gentelella/src/js/custom',
   'node_modules/gentelella/src/js/helpers/smartresize'
   ], 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css');
