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

/* mix.webpackConfig({ resolve: { fallback: {
   "http": require.resolve("stream-http"),
   "https": require.resolve("https-browserify"),
   "stream": require.resolve("stream-browserify"),
   "zlib": require.resolve("browserify-zlib")
} } }); */
mix.webpackConfig({ resolve: { fallback: {
   "http": false,
   "https": false,
   "stream": false,
   "zlib": false
} } });
mix.setResourceRoot('/allo');
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .styles('resources/css/style.css', 'public/css/style.css');
