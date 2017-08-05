const { mix } = require('laravel-mix');

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

mix//.js('resources/assets/js/app.js', 'public/js')
  //.sass('resources/assets/sass/app.scss', 'public/css')
  //.sass('resources/assets/sass/master.scss', 'public/css')
  // .react('resources/assets/js/components/module_chat/chat-master.js','public/js/plugins')
  //  .browserSync('http://localhost/livefootball/public/')
  //  .disableNotifications();
  // .styles([
  //   'resources/assets/lib/videojs/video-js.css',
  //   'resources/assets/lib/videojs/videojs-errors.css',
  //   'resources/assets/lib/videojs/custom.css',
  //   // 'resources/assets/lib/videojs/videojs-dvrseekbar.css'
  // ],'public/js/lib/ainokishi.css')
  .scripts([
    'resources/assets/lib/videojs/stackblur.min.js',
    'resources/assets/lib/videojs/video.js',
    'resources/assets/lib/videojs/videojs-ie8.min.js',
    'resources/assets/lib/videojs/videojs-flash.js',
    'resources/assets/lib/videojs/videojs-contrib-hls.js',
    'resources/assets/lib/videojs/videojs-errors.js',
    //'resources/assets/lib/videojs/videojs-dvrseekbar.min.js',
    'resources/assets/lib/videojs/config.js'
  ],'public/js/lib/ainokishi.js')
  ;
