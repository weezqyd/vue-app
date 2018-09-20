let mix = require('laravel-mix');

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

mix
    /* CSS */
    .sass('resources/assets/sass/main.scss', 'public/css/ui-kit.css')
    .sass('resources/assets/sass/ui-kit/themes/xeco.scss', 'public/css/themes/')
    .sass('resources/assets/sass/ui-kit/themes/xinspire.scss', 'public/css/themes/')
    .sass('resources/assets/sass/ui-kit/themes/xmodern.scss', 'public/css/themes/')
    .sass('resources/assets/sass/ui-kit/themes/xsmooth.scss', 'public/css/themes/')
    .sass('resources/assets/sass/ui-kit/themes/xwork.scss', 'public/css/themes/')

    /* JS */
    .js('resources/assets/js/app/main.js', 'public/js/main.app.js')
    .js('resources/assets/js/ui-kit/app.js', 'public/js/ui-kit.app.js')

    /* Tools */
    .browserSync('kit.dashmix.local')
    //.disableNotifications()

    /* Options */
    .options({
        processCssUrls: false
    });
