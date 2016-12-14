var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    browserSync = require('browser-sync').create(),
    plumber = require('gulp-plumber'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    eslint = require('gulp-eslint'),
    notify = require('gulp-notify');

    var plumberErrorHandler = {
      errorHandler: notify.onError({
        title: 'Gulp',
        message: 'Error: <%= error.message %>'//Will see a notification if not able to compile Sass file
      })
    };

    //sass
    gulp.task('sass', function() {
      gulp.src('./sass/style.scss')
      .pipe(plumber(plumberErrorHandler))
      .pipe(sass())
      .pipe(autoprefixer({
        browsers: ['last 2 versions']
      }))
      .pipe(gulp.dest('./build/css'))
      .pipe(cssnano())
      .pipe(rename('style.min.css'))
      .pipe(gulp.dest('./build/css'));
    });

    //uglify
    gulp.task('js', function(){//Runs a task that we named default
      gulp.src('./js/*.js')// Files gulp will work with
      .pipe(uglify()) //Minifies
      .pipe(rename({ extname: '.min.js' })) //Changes name to .min.js
      .pipe(gulp.dest('./build/js')) //Takes everything and puts them in build/js?
    });

    //browser-sync with watch nested inside
    gulp.task('browser-sync', function() {
      browserSync.init({
        server: {
          baseDir: "./"
        }
      });

      gulp.watch(["build/css/*.css", "build/js/*.js"]).on('change', browserSync.reload);

    });

    //lint
    gulp.task('lint', function() {
      return gulp.src('js/*.js').pipe(eslint())
      .pipe(eslint.format())
      // Brick on failure to be super strict
      .pipe(eslint.failOnError());
    });

    //watch
    gulp.task('watch',function(){
      gulp.watch('js/*js',['js','lint'])
      gulp.watch('sass/*.scss',['sass']);
    });

    //default
    gulp.task('default', ['browser-sync', 'watch']);
