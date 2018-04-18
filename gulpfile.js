var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    var gulp = require('gulp');
    var sass = require('gulp-sass');
    var minifyCss = require('gulp-minify-css');

    // console error 
    var gutil = require('gulp-util');

    //  Strip console, alert, and debugger statements from JavaScript code
    var stripDebug = require('gulp-strip-debug');

    // var sass = require('gulp-sass');
    //var sourcemaps = require('gulp-sourcemaps');
    var uglify = require('gulp-uglify');

    var pump = require('pump');

    var concat = require('gulp-concat');
    var count = require('gulp-count');
    var clean = require('gulp-rimraf');

    var autoprefixer = require('gulp-autoprefixer');

    // var gutil = require('gulp-util');

    gulp.task('bcss', function() {
        mix.sass('main.scss', 'public/css/main.css');
        mix.sass('theme.scss', 'public/css/theme.css');
        mix.sass('vendor.scss', 'public/css/vendor.css');
    });

    gulp.task('styles', function() {
        mix.sass('style.scss', 'public/css/style.css');
        mix.sass('vendors.scss', 'public/css/vendors.css');
    });


    // minify js for front-end
    gulp.task('minify_js', function() {

        return gulp.src([
            './public/vendors/jquery/dist/jquery.js',
            './public/vendors/tether/dist/js/tether.min.js',
            './public/vendors/bootstrap/dist/js/bootstrap.min.js',
            './public/vendors/magnific-popup/dist/jquery.magnific-popup.min.js',
            './public/js/owlcarousel/owl.carousel.min.js',
            './public/js/tenglay/app.js',
        ])
        .pipe(count('## js-files selected'))
        .pipe(stripDebug())   
        .pipe(concat('hh-script.js'))
        // .pipe(stripDebug())
        .pipe(uglify({mangle: false, compress: true}).on('error', gutil.log))
        // .pipe(uglify({
        //     mangle: {
        //         except: ['angular', '_', 'app', 'namespace', 'dataMock']
        //     }
        // })) 
        .pipe(gulp.dest('./public/js/build/'));
    });


    // minify js for admin 
    gulp.task('minify_js_admin', function() {

        return gulp.src([
            // './public/js/app.js',
            // './public/vendor/flexcms/vendors/**/*.js',
            './public/vendor/flexcms/vendors/jquery/dist/jquery.min.js',
            './public/vendor/flexcms/vendors/moment/min/moment.min.js',
            './public/vendor/flexcms/vendors/magnific-popup/dist/jquery.magnific-popup.min.js',
            './public/vendor/flexcms/vendors/underscore/underscore-min.js',
            './public/vendor/flexcms/vendors/angular/angular.min.js',
            './public/vendor/flexcms/vendors/angular-animate/angular-animate.js',
            './public/vendor/flexcms/vendors/angular-google-maps/dist/angular-google-maps.min.js',
            './public/vendor/flexcms/vendors/lodash/dist/lodash.min.js',
            './public/vendor/flexcms/vendors/angular-simple-logger/dist/angular-simple-logger.min.js',

            './public/vendor/flexcms/vendors/ngmap/build/scripts/ng-map.min.js',
            './public/vendor/flexcms/vendors/angular-resource/angular-resource.min.js',
            './public/vendor/flexcms/vendors/angular-drag-and-drop-lists/angular-drag-and-drop-lists.js',
            // './public/vendor/flexcms/vendors/angular-drag-and-drop-lists/angular-drag-and-drop-lists.min.js',
            './public/vendor/flexcms/vendors/angular-aria/angular-aria.min.js',
            './public/vendor/flexcms/vendors/angular-material/angular-material.min.js',
            './public/vendor/flexcms/vendors/angular-route/angular-route.min.js',
            './public/vendor/flexcms/vendors/angular-sanitize/angular-sanitize.min.js',
            './public/vendor/flexcms/vendors/ng-file-upload/ng-file-upload.min.js',

            './public/vendor/flexcms/vendors/material-angular-paging/build/dist.min.js',
            './public/vendor/flexcms/vendors/ng-file-upload-shim/ng-file-upload-shim.min.js',
            './public/vendor/flexcms/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
            './public/vendor/flexcms/vendors/angular-material-data-table/dist/md-data-table.min.js',

            './public/vendor/flexcms/vendors/angular-material-datetimepicker/js/angular-material-datetimepicker.min.js',

            './public/vendor/flexcms/vendors-download/ckeditor/ckeditor.js',

            './public/vendor/flexcms/js/util/namespace.js',

            './public/vendor/flexcms/js/apps/dashboard.js',
            './public/vendor/flexcms/js/apps/dashboard.config.js',

            './public/vendor/flexcms/js/config/env.js',

            './public/vendor/flexcms/js/util/route.js',
            './public/vendor/flexcms/js/util/menu.js',
            './public/vendor/flexcms/js/util/crypt/aes.js',
            './public/vendor/flexcms/js/util/crypt/pbkdf2.js',
            './public/vendor/flexcms/js/util/jsencrypt.js',
            './public/vendor/flexcms/js/util/endpoint.js',

            './public/vendor/flexcms/js/services/resource.js',
            './public/vendor/flexcms/js/services/crypt.js',

            './public/vendor/flexcms/js/directives/**/*.js',

            './public/vendor/flexcms/js/controllers/**/*.js',
            './public/vendor/flexcms/js/services/**/*.js',

            './public/vendor/flexcms/js/controllers/alert.js',
            './public/vendor/flexcms/js/controllers/left.js',
            './public/vendor/flexcms/js/controllers/loading.js',

        ])
        .pipe(count('## js-files selected admin script'))   
        .pipe(concat('hh-admin-script.js'))
        // .pipe(uglify({
        //     // mangle: false
        //     mangle: {
        //         except: ['angular', '_', 'app', 'namespace', 'dataMock']
        //     }
        // }))
        .pipe(gulp.dest('./public/build/js'));
    });


    gulp.task('mix_css', function() {

        return gulp.src([
            './public/css/vendors.css',
            './public/fonts/icomoon-front/style.css',
            // './public/vendors/flickity/dist/flickity.min.css',
            './public/vendors/magnific-popup/dist/magnific-popup.css',
            './public/js/owlcarousel/assets/owl.carousel.min.css',
            './public/js/owlcarousel/assets/owl.theme.default.min.css',
            // './public/vendors/vegas/dist/vegas.min.css',
        ])
        .pipe(count('## css-files selected'))
        .pipe(autoprefixer())   
        .pipe(concat('vendors_mix.css'))
        .pipe(gulp.dest('./public/css/'));

    });

    gulp.task('mix_css_admin', function() {

        return gulp.src([
            './public/vendor/flexcms/css/**/*.css',
        ])
        .pipe(count('## css-files admin selected'))
        .pipe(autoprefixer())      
        .pipe(concat('admin_style.css'))
        .pipe(gulp.dest('./public/build/css/'));

    });

    gulp.task('minify_css', function() {
        return gulp.src('./public/css/*.css')
            .pipe(minifyCss())
            .pipe(gulp.dest('./public/css'));
    });

    gulp.task('minify_css_admin', function() {
        return gulp.src('./public/build/css/*.css')
            .pipe(minifyCss())
            .pipe(gulp.dest('./public/build/css/'));
    });

    gulp.task('copy_file', function(cb) {

        gulp.src('./public/fonts/BLOKKNeue/*')
             .pipe(gulp.dest('./public/build/fonts/BLOKKNeue'));

        return gulp.src('./public/fonts/icomoon-front/fonts/*')
             .pipe(gulp.dest('./public/build/css/fonts'));

    });

    gulp.task('version', function() {
        mix.version(["public/css/style.css", "public/css/vendors_mix.css", "public/js/build/hh-script.js", "public/css/admin_style.css"]);
        // mix.version(["public/css/style.css", "public/css/vendors_mix.css", "public/js/build/hh-script.js", "public/css/admin_style.css", "public/js/build/hh-admin-script.js"]);
        // mix.version(["public/css/admin_style.css", "public/js/build/hh-admin-script.js"]);
    });

    // gulp.task('version_admin', function() {
    //     mix.version(["public/css/style.css", "public/css/vendors_mix.css", "public/js/build/hh-script.js", "public/css/admin_style.css"]);
    //     // mix.version(["public/css/style.css", "public/css/vendors_mix.css", "public/js/build/hh-script.js", "public/css/admin_style.css", "public/js/build/hh-admin-script.js"]);
    //     // mix.version(["public/css/admin_style.css", "public/js/build/hh-admin-script.js"]);
    // });

    gulp.task('clean_before', function() {
        return gulp.src('./public/build', {read: false, force: true})
            .pipe(clean());
    });

    gulp.task('prod', ['mix_css', 'mix_css_admin','minify_css', 'minify_js', 'version', 'copy_file']);
    gulp.task('prod_admin', ['clean_before','mix_css_admin', 'minify_css_admin', 'minify_js_admin']);

});