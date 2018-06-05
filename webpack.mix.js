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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
  mix.scripts([
   			'resources/assets/js/materialize.min.js',
   			'resources/assets/js/main.js',
        // 'public/assets/template/js/bootstrap.min.js',
        // 'public/assets/template/js/front.js',
        // 'public/assets/template/js/jquery.scrollTo.min.js',
        // 'public/assets/template/js/jquery-1.11.0.min.js',
        // 'public/assets/template/js/modernizr-2.6.2.min.js',
        // 'public/assets/template/js/owl.carousel.min.js',
        // 'public/assets/template/js/respond.min.js',
        // 'public/assets/template/js/waypoints.min.js',
        // 'public/js/app.js',
        // 'public/js/jquery-3.3.1.js'
        ], 
        'public/js/app.js')
   .styles([
            'resources/assets/css/app.css',
            'resources/assets/css/connections.css',
            'resources/assets/css/messaging.css',
            'resources/assets/css/ideas.css',
            'resources/assets/css/font-awesome.min.css',
            'resources/assets/css/materialize-colors.css',
            'resources/assets/css/materialize.min.css',
            // 'resources/assets/css/main.css',
            //     'public/assets/template/animate.css',
            //     'public/assets/template/css/bootstrap.css',
            //     'public/assets/template/css/custom.css',
            //     'public/assets/template/css/template/owl.carousel.css',
            //     'public/assets/template/css/template/owl.theme.css',
            //     'public/assets/template/css/template/styles.default.css'
        ], 
        'public/css/app.css')
    .version();