
/*
* GULP CONFIGURATION
*
* Load gulp plugins, set file paths, set variable names
*/
var gulp 			= require('gulp');

// CSS plugins
var sass 		 	= require('gulp-sass'); // Sass compiler
var autoprefixer 	= require('gulp-autoprefixer'); // Vendor prefixes
var cleancss		= require('gulp-clean-css'); // Minify CSS files with SourceMaps intact
//var mmq			= require('gulp-merge-media-queries') // combine matching media queries into one definition

// JS plugins
var concat			= require('gulp-concat'); // Concatenate JS files
var uglify 			= require('gulp-uglify'); // Minify JS files
// var jshint 			= require('gulp-jshint'); // Lint JS files
// var stylish			= require('jshint-stylish'); // JShint error styles

// IMG
// var imagemin     = require('gulp-imagemin')

// Utilities
var rename			= require('gulp-rename'); // Rename files
//var lineec		= require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems.
var sourcemaps   	= require('gulp-sourcemaps');	
var notify			= require('gulp-notify'); // Notification messages
var browserSync		= require('browser-sync').create(); // reload browser and inject css
var reload		 	= browserSync.reload; // manual browser reload

// SVG
// var svgSprite		= require('gulp-svg-sprite');
// var svgConfig 		= {
// 						mode : { // output mode
// 								view : {	// view mode for background-image svg usage
// 											dimensions : true, 
// 											sprite  : 'sprite-view',
// 											bust	: false,
// 											render	: { scss : true }
// 								} // view
// 						}, // mode
// };

var prod = {
	css  : './',
	js   : './assets/js'
	// img  : './img'
}

// var svg = {
// 	svgs   	 	 : './assets/svg/*.svg',
// 	svgOutput 	 : './assets/svg',
// }


// GULP TASKS
////////////////////////////////////////////

// gulp
gulp.task( 'default', ['styles', 'js', 'js-vendor', 'browser-sync'], function() {
	gulp.watch('./*.html', reload);
	gulp.watch('./*.php', reload);
	gulp.watch('./styles/**/*.scss', ['styles']);
	//gulp.watch(assets.js, ['js', reload]);
	//gulp.watch(assets.js, ['js-vendor', reload]);
});

// browser sync - static server
gulp.task( 'browser-sync', function() {
	browserSync.init({
		proxy   : "http://localhost/safety-execs-of-ny/wp",
		//server: './',

		notify: {
    		styles: {
        		top: 'auto',
        		bottom: '0'
    		}
		},
		injectChanges: true
	});
});

// styles
// for wordpress - style.css must be present in the root dir
gulp.task( 'styles', function() {
	gulp.src('./styles/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({ 
			outputStyle: 'nested',
			// outputStyle: 'compressed',
			// outputStyle: 'nested',
			//outputStyle: 'expanded',
			precision: 10 
		}))
		.on('error', sass.logError)
		.pipe(autoprefixer())
		.pipe(sourcemaps.write())
		//.pipe(rename('style.min.css'))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream())
		.pipe(notify({message: 'TASK: "styles" Complete', onLast: true}));
})

// js vendor
gulp.task( 'js-vendor', function() {
 	gulp.src([
		'./assets/js/vendor/modernizr-2.6.2-min.js',
		'./assets/js/vendor/jquery.validate.min.js',
		'./assets/js/vendor/additional-methods.min.js'
		])
 		.pipe( concat( 'vendor.js' ))
 		//.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
 		.pipe( gulp.dest( prod.js ))
 		.pipe( rename( {
 			basename: 'vendor',
 			suffix: '.min'
 		}))
 		.pipe( uglify() )
 		//.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
 		.pipe( gulp.dest( prod.js ))
 		.pipe( notify( { message: 'TASK: "js-vendor" Complete', onLast: true } ) );
 });

// js custom
gulp.task( 'js', function() {
	gulp.src([
		'./assets/js/custom/plugins-min.js',
		'./assets/js/custom/main-min.js',
		'./assets/js/custom/custom.js'
		])
		.pipe( concat( 'script.js' ) )
		//.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( prod.js ) )
		.pipe( rename( {
			basename: 'script',
			suffix: '.min'
		}))
		.pipe( uglify().on('error', function(e){ 
			console.log(e);
		}))
		//.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( prod.js ) )
		.pipe( notify( { message: 'TASK: "js" Complete', onLast: true } ) );
});


// svg
// gulp.task('svg', function(){
// 	gulp.src(svg.svgs)
// 		.pipe(svgSprite(svgConfig))
// 		.on('error', function(error){ console.log(error); })
// 		.pipe(gulp.dest(svg.svgOutput))
// 		.pipe(rename('_svgViewSprite.scss'))
// 		.pipe(gulp.dest('./assets/scss/partials'));

// 	gulp.src('./assets/svg/view/sprite-view.svg')
// 	.pipe(gulp.dest('./'));
// });

// img
// gulp.task( 'images', function() {
// 	gulp.src( imagesSRC )
// 		.pipe( imagemin( {
// 					progressive: true,
// 					optimizationLevel: 3, // 0-7 low-high
// 					interlaced: true,
// 					svgoPlugins: [{removeViewBox: false}]
// 				} ) )
// 		.pipe(gulp.dest( imagesDestination ))
// 		.pipe( notify( { message: 'TASK: "images" Completed! 💯', onLast: true } ) );
// });
