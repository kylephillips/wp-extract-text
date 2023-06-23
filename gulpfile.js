var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefix = require('gulp-autoprefixer');
var livereload = require('gulp-livereload');
var notify = require('gulp-notify');
var minifycss = require('gulp-minify-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var pump = require('pump');

// Style Paths
var admin_css = 'assets/css/admin/';
var admin_scss = 'assets/scss/admin/*';

// JS Paths
var js_source_admin = [
	'assets/js/admin/src/extract-text.factory.js',
];
var js_compiled = 'assets/js/';

var admin_styles = function(){
	return gulp.src(admin_scss)
		.pipe(sass({sourceComments: 'map', sourceMap: 'sass', style: 'compact'}))
		.pipe(autoprefix('last 5 version'))
		.pipe(minifycss({keepBreaks: false}))
		.pipe(gulp.dest(admin_css))
		.pipe(livereload())
		.pipe(notify('Extract Text admin styles processed.'));
}


/**
* Concatenate and minify scripts
*/
var admin_scripts = function(){
	return gulp.src(js_source_admin)
		.pipe(concat('extract-text-admin.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest(js_compiled));
};

/**
* Watch Task
*/
gulp.task('watch', function(){
	livereload.listen();
	gulp.watch(admin_scss, gulp.series(admin_styles));
	gulp.watch(js_source_admin, gulp.series(admin_scripts));
});

/**
* Default
*/
gulp.task('default', gulp.series(admin_styles, admin_scripts, 'watch'));