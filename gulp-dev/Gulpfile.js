var themename = 'starterpack';

var gulp = require('gulp'),
	// Prepare and optimize code etc
	autoprefixer = require('autoprefixer'),
	browserSync = require('browser-sync').create(),
	image = require('gulp-image'),
	jshint = require('gulp-jshint'),
	postcss = require('gulp-postcss'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	cleanCss = require( 'gulp-clean-css' ), 
	rename = require('gulp-rename'),
	concat = require( 'gulp-concat' ), 
	uglify = require( 'gulp-uglify' ), 

	// Only work with new or updated files
	newer = require('gulp-newer'),

	// Name of working theme folder
	root = '../' + themename + '/',
	scss = root + 'sass/',
	js = root + 'js/',
	img = root + 'images/',
	languages = root + 'languages/';


// CSS via Sass and Autoprefixer
gulp.task('css', function() {
	return gulp.src(scss + '{style.scss,rtl.scss}')
	.pipe(sourcemaps.init())
	.pipe(sass({
		outputStyle: 'expanded', 
		indentType: 'tab',
		indentWidth: '1'
	}).on('error', sass.logError))
	.pipe(postcss([
		autoprefixer('last 2 versions', '> 1%')
	]))
	.pipe(sourcemaps.write(scss + 'maps'))
	//.pipe(cleanCss() )
	.pipe(gulp.dest(root));
});

// Minify css for production
gulp.task('cssmini', function() {
	return gulp.src(scss + '{style.scss,rtl.scss}')
	.pipe(sourcemaps.init())
	.pipe(sass({
		outputStyle: 'expanded', 
		indentType: 'tab',
		indentWidth: '1'
	}).on('error', sass.logError))
	.pipe(postcss([
		autoprefixer('last 2 versions', '> 1%')
	]))
	.pipe(sourcemaps.write(scss + 'maps'))
	.pipe(cleanCss())
	.pipe(gulp.dest(root));
});

// Optimize images through gulp-image
gulp.task('images', function() {
	return gulp.src(img + 'RAW/**/*.{jpg,JPG,png}')
	.pipe(newer(img))
	.pipe(image())
	.pipe(gulp.dest(img));
});

//Javascript production front page
gulp.task('jsfp', function() {
	return gulp.src([
		js + 'functions.js',
		js + 'scroll-scripts.js',
		js + 'header-script.js',
		js + 'skip-link-focus-fix.js'
	])
	.pipe(concat('fpscripts.js'))
	.pipe(gulp.dest(js))
	.pipe(rename('fpscripts.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest(js));
});

//Javascript production all other pages
gulp.task('jspages', function() {
	return gulp.src([
		js + 'functions.js',
		js + 'skip-link-focus-fix.js'
	])
	.pipe(concat('scripts.js'))
	.pipe(gulp.dest(js))
	.pipe(rename('scripts.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest(js));
});

//Javascript production minify misc js
gulp.task('jsmini', function() {
	return gulp.src([
		js + 'navigation.js',
		js + 'login-scripts.js'
	])
	.pipe(rename({ suffix: '.min' }))
	.pipe(uglify())
	.pipe(gulp.dest(js));
});

// JavaScript
gulp.task('javascript', function() {
	return gulp.src([js + '*.js'])
	.pipe(jshint())
	.pipe(jshint.reporter('default'))
	.pipe(gulp.dest(js));
});

// Watch everything
gulp.task('watch', function() {
	browserSync.init({ 
		open: 'external',
		proxy: 'kelcher.test',
		port: 8080
	});
	gulp.watch([root + '**/*.css', root + '**/*.scss' ], ['css']);
	gulp.watch(js + '**/*.js', ['javascript']);
	gulp.watch(img + 'RAW/**/*.{jpg,JPG,png}', ['images']);
	gulp.watch(root + '**/*').on('change', browserSync.reload);
});


// Default task (runs at initiation: gulp --verbose)
gulp.task('default', ['watch']);
