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
 require('dotenv').config();

mix.js('resources/js/app.js', 'public/js')
mix.js('resources/js/admin_generalSetting.js', 'public/js/admin')
mix.js('resources/js/admin_billingRequest.js', 'public/js/admin')
mix.js('resources/js/admin_clients.js', 'public/js/admin')
mix.js('resources/js/admin_drivers.js', 'public/js/admin')
mix.js('resources/js/admin_others.js', 'public/js/admin')
mix.js('resources/js/admin_profile.js', 'public/js/admin')
mix.js('resources/js/admin_requestRide.js', 'public/js/admin')
mix.js('resources/js/admin_submitFeedBack.js', 'public/js/admin')
mix.js('resources/js/driver_dashboard.js', 'public/js/admin')
mix.js('resources/js/admin_driver_payment.js', 'public/js/admin')
mix.js('resources/js/driver_payment_get.js', 'public/js/admin')
    .sass('resources/sass/app.scss', 'public/css');
  //  .sass('resources/sass/admin.scss', 'public/css');
