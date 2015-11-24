var gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
	notify = require('gulp-notify'),
	bower = require('gulp-bower'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	livereload = require('gulp-livereload');

gulp.task('bower', function() {
	return bower().pipe(gulp.dest('./bower_components'))
});

gulp.task('fonts-fa', function() {
	return gulp.src('./bower_components/font-awesome/fonts/**.*').pipe(gulp.dest('./assets/fonts'));
});

gulp.task('fonts-bootstrap', function() {
	return gulp.src('./bower_components/bootstrap-sass/assets/fonts/bootstrap/**.*').pipe(gulp.dest('./assets/fonts'));
});

gulp.task('css', function() {
	return sass('./assets/style.scss', {
			style: 'compressed',
			loadPath: [
				'./bower_components/bootstrap-sass/assets/stylesheets',
				'./bower_components/font-awesome/scss'
			]
		})
		.on('error', notify.onError(function(error) {
			return 'Error: ' + error.message;
		}))
		.pipe(gulp.dest('./assets/css'))
		.pipe(livereload());
});

gulp.task('js', function(){
	return gulp.src([
			'./bower_components/jquery/dist/jquery.min.js', 
			'./bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
			'./assets/script.js'
		])
		.pipe(concat('script.js'))
		.pipe(gulp.dest('./assets/js'))
		.pipe(uglify());
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('./assets/style.scss', ['css']);
	gulp.watch('./assets/script.js', ['js']);

	livereload({start: true});
	var livereloadPage = function () {
		livereload.reload();
	};

	gulp.watch('../**/*.php', livereloadPage);
});

gulp.task('default', ['bower', 'fonts-fa', 'fonts-bootstrap', 'css', 'js', 'watch']);
