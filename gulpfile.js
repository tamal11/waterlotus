// Defining requirements
var gulp = require( 'gulp' );
var plumber = require( 'gulp-plumber' );
var sass = require( 'gulp-sass' );
var watch = require( 'gulp-watch' );
var rename = require( 'gulp-rename' );
var concat = require( 'gulp-concat' );
var uglify = require( 'gulp-uglify' );
var imagemin = require( 'gulp-imagemin' );
var ignore = require( 'gulp-ignore' );
var rimraf = require( 'gulp-rimraf' );
var sourcemaps = require( 'gulp-sourcemaps' );
var browserSync = require( 'browser-sync' ).create();
var del = require( 'del' );
var cleanCSS = require( 'gulp-clean-css' );
var gulpSequence = require( 'gulp-sequence' );
var replace = require( 'gulp-replace' );
var autoprefixer = require( 'gulp-autoprefixer' );

// Configuration file to keep your code DRY
var cfg = require( './gulpconfig.json' );
var paths = cfg.paths;

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task( 'sass', function() {
    var stream = gulp.src( paths.sass + '/*.scss' )
        .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err );
                this.emit( 'end' );
            }
        } ) )
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe( sass( { errLogToConsole: true } ) )
        .pipe( autoprefixer( 'last 2 versions' ) )
        .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
        .pipe( gulp.dest( paths.css ) )
    return stream;
});

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task( 'watch', function() {
    gulp.watch( paths.sass + '/**/*.scss', ['styles'] );
    gulp.watch( [paths.dev + '/js/**/*.js', 'js/**/*.js', '!js/theme.js', '!js/theme.min.js'], ['scripts'] );

    //Inside the watch task.
    gulp.watch( paths.imgsrc + '/**', ['imagemin-watch'] );
});

/**
 * Ensures the 'imagemin' task is complete before reloading browsers
 * @verbose
 */
gulp.task( 'imagemin-watch', ['imagemin'], function( ) {
  browserSync.reload();
});

// Run:
// gulp imagemin
// Running image optimizing task
gulp.task( 'imagemin', function() {
    gulp.src( paths.imgsrc + '/**' )
    .pipe( imagemin() )
    .pipe( gulp.dest( paths.img ) );
});

// Run:
// gulp cssnano
// Minifies CSS files
gulp.task( 'cssnano', function() {
  return gulp.src( paths.css + '/theme.css' )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err );
                this.emit( 'end' );
            }
        } ) )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( cssnano( { discardComments: { removeAll: true } } ) )
    .pipe( sourcemaps.write( './' ) )
    .pipe( gulp.dest( paths.css ) );
});

gulp.task( 'minifycss', function() {
  return gulp.src( paths.css + '/theme.css' )
  .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( cleanCSS( { compatibility: '*' } ) )
    .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err ) ;
                this.emit( 'end' );
            }
        } ) )
    .pipe( rename( { suffix: '.min' } ) )
     .pipe( sourcemaps.write( './' ) )
    .pipe( gulp.dest( paths.css ) );
});

gulp.task( 'cleancss', function() {
  return gulp.src( paths.css + '/*.min.css', { read: false } ) // Much faster
    .pipe( ignore( 'theme.css' ) )
    .pipe( rimraf() );
});

gulp.task( 'styles', function( callback ) {
    gulpSequence( 'sass', 'css', 'minifycss' )( callback );
} );

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task( 'browser-sync', function() {
    browserSync.init( cfg.browserSyncWatchFiles, cfg.browserSyncOptions );
} );

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task( 'watch-bs', ['browser-sync', 'watch', 'scripts'], function() {
} );

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task( 'scripts', function() {
  var scripts = [

    // Start - All BS stuff
    paths.dev + '/js/bootstrap/bootstrap.min.js',
    
    // all FA stuff
    //paths.dev + '/js/fontawesome/all.min.js',

    // imagesloaded stuff
    //paths.dev + '/js/imagesloaded/imagesloaded.pkgd.min.js',

    // infinit-scroll stuff
    //paths.dev + '/js/infinite-scroll/infinite-scroll.pkgd.min.js',

    // magnific-popup stuff
    //paths.dev + '/js/magnific-popup/jquery.magnific-popup.min.js',
    
    // masonry-layout stuff
    //paths.dev + '/js/masonry-layout/masonry.pkgd.min.js',
    
    // mixitup stuff
    //paths.dev + '/js/mixitup/mixitup.min.js',
    
    // owl-carousel stuff
    paths.dev + '/js/owl-carousel/owl.carousel.min.js',

    // Adding currently empty javascript file to add on for your own themes´ customizations
    // Please add any customizations to this .js file only!
    paths.dev + '/js/main.js'
  ];
  gulp.src( scripts )
    .pipe( concat( 'theme.min.js' ) )
    .pipe( uglify() )
    .pipe( gulp.dest( paths.js ) );

  gulp.src( scripts )
    .pipe( concat( 'theme.js' ) )
    .pipe( gulp.dest( paths.js ) );
});

// Run:
// gulp css.
// minify and concat all library css files into one
gulp.task( 'css', function() {
  var css = [

    // All BS stuff
    paths.dev + '/css/bootstrap/bootstrap.min.css',
    // All FA stuff
    paths.dev + '/css/fontawesome/all.min.css',
    // All magnific-popup stuff
    //paths.dev + '/css/magnific-popup/magnific-popup.css',
    // All owl-carousel stuff
    paths.dev + '/css/owl-carousel/owl.carousel.min.css',
    paths.dev + '/css/owl-carousel/owl.theme.default.min.css',

  ];
gulp.src( css )
  .pipe( concat( 'libs.min.css' ) )
  .pipe( cleanCSS( { compatibility: '*' } ) )
  .pipe( gulp.dest( paths.css ) );

gulp.src( css )
  .pipe( concat( 'libs.css' ) )
  .pipe( gulp.dest( paths.css ) );
});

// Deleting any file inside the /src folder
gulp.task( 'clean-source', function() {
  return del( ['src/**/*'] );
});

// Run:
// gulp copy-assets.
// Copy all needed dependency assets files from bower_component assets to themes /js, /scss and /fonts folder. Run this task after bower install or bower update

gulp.task( 'copy-assets', function() {

  // Copy all JS files
  var stream = gulp.src( paths.node + 'bootstrap/dist/js/**/*.js' )
    .pipe( gulp.dest( paths.dev + '/js/bootstrap' ) );
  
  // gulp.src( paths.node + '@fortawesome/fontawesome-free/js/**/*.js' )
  //   .pipe( gulp.dest( paths.dev + '/js/fontawesome' ) );
  
  // gulp.src( paths.node + 'mixitup/dist/*.js' )
  //   .pipe( gulp.dest( paths.dev + '/js/mixitup' ) );
  
  // gulp.src( paths.node + 'magnific-popup/dist/*.js' )
  //   .pipe( gulp.dest( paths.dev + '/js/magnific-popup' ) );
  
  gulp.src( paths.node + 'owl.carousel/dist/*.js' )
    .pipe( gulp.dest( paths.dev + '/js/owl-carousel' ) );
  
  // gulp.src( paths.node + 'masonry-layout/dist/*.js' )
  //   .pipe( gulp.dest( paths.dev + '/js/masonry-layout' ) );
  
  // gulp.src( paths.node + 'imagesloaded/*.js' )
  //   .pipe( gulp.dest( paths.dev + '/js/imagesloaded' ) );
  
  // gulp.src( paths.node + 'infinite-scroll/dist/*.js' )
  //   .pipe( gulp.dest( paths.dev + '/js/infinite-scroll' ) );

  // Copy all CSS files
  // external library css from nodemodules to /src/css
  gulp.src(paths.node + 'bootstrap/dist/css/*.css')
    .pipe(gulp.dest(paths.dev + '/css/bootstrap'));
    
  gulp.src(paths.node + '@fortawesome/fontawesome-free/css/*.css')
    .pipe(gulp.dest(paths.dev + '/css/fontawesome'));
	
	gulp.src( paths.node + '@fortawesome/fontawesome-free/webfonts/*.{ttf,woff,woff2,eot,svg}' )
    .pipe( gulp.dest( './webfonts' ) );

  // gulp.src(paths.node + 'magnific-popup/dist/*.css')
  //   .pipe(gulp.dest(paths.dev + '/css/magnific-popup'));  

  gulp.src(paths.node + 'owl.carousel/dist/assets/**/*.css')
    .pipe(gulp.dest(paths.dev + '/css/owl-carousel'));
	
  // _s stuff
	 gulp.src( paths.node + 'undescores-for-npm/sass/media/*.scss' )
			.pipe( gulp.dest( paths.sass + '/underscores' ) );

	 gulp.src( paths.node + 'undescores-for-npm/js/skip-link-focus-fix.js' )
			.pipe( gulp.dest( paths.dev + '/js' ) );

});

// Deleting the files distributed by the copy-assets task
gulp.task( 'clean-vendor-assets', function() {
  return del( [paths.dev + '/js/bootstrap4/**', paths.dev + '/sass/bootstrap4/**', './fonts/*wesome*.{ttf,woff,woff2,eot,svg}', paths.dev + '/sass/fontawesome/**', paths.dev + '/sass/underscores/**', paths.dev + '/js/skip-link-focus-fix.js', paths.js + '/**/skip-link-focus-fix.js', paths.js + '/**/popper.min.js', paths.js + '/**/popper.js', ( paths.vendor !== ''?( paths.js + paths.vendor + '/**' ):'' )] );
});

// Run
// gulp dist
// Copies the files to the /dist folder for distribution as simple theme
gulp.task( 'dist', ['clean-dist'], function() {
  return gulp.src( ['**/*', '!' + paths.bower, '!' + paths.bower + '/**', '!' + paths.node, '!' + paths.node + '/**', '!' + paths.dev, '!' + paths.dev + '/**', '!' + paths.dist, '!' + paths.dist + '/**', '!' + paths.distprod, '!' + paths.distprod + '/**', '!' + paths.sass, '!' + paths.sass + '/**', '!readme.txt', '!readme.md', '!package.json', '!package-lock.json', '!gulpfile.js', '!gulpconfig.json', '!CHANGELOG.md', '!.travis.yml', '!jshintignore',  '!codesniffer.ruleset.xml',  '*'], { 'buffer': true } )
  .pipe( replace( '/js/jquery.slim.min.js', '/js' + paths.vendor + '/jquery.slim.min.js', { 'skipBinary': true } ) )
  .pipe( replace( '/js/popper.min.js', '/js' + paths.vendor + '/popper.min.js', { 'skipBinary': true } ) )
  .pipe( replace( '/js/skip-link-focus-fix.js', '/js' + paths.vendor + '/skip-link-focus-fix.js', { 'skipBinary': true } ) )
    .pipe( gulp.dest( paths.dist ) );
});

// Deleting any file inside the /dist folder
gulp.task( 'clean-dist', function() {
  return del( [paths.dist + '/**'] );
});

// Run
// gulp dist-product
// Copies the files to the /dist-prod folder for distribution as theme with all assets
gulp.task( 'dist-product', ['clean-dist-product'], function() {
  return gulp.src( ['**/*', '!' + paths.bower, '!' + paths.bower + '/**', '!' + paths.node, '!' + paths.node + '/**', '!' + paths.dist, '!' + paths.dist +'/**', '!' + paths.distprod, '!' + paths.distprod + '/**', '*'] )
    .pipe( gulp.dest( paths.distprod ) );
} );

// Deleting any file inside the /dist-product folder
gulp.task( 'clean-dist-product', function() {
  return del( [paths.distprod + '/**'] );
} );

// Run:
// gulp
// Starts watcher (default task)
gulp.task('default', ['watch']);
