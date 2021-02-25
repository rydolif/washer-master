var gulp = require('gulp'),
    $ = require('gulp-load-plugins')(),
    path = require('path'),
    concatCss = require('gulp-concat-css'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    autoprefixer = require('gulp-autoprefixer'),
    minifyCss = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

// css
gulp.task('css', function () {
  return gulp.src([
      'css/style.css',
    ])
    .pipe(concatCss("style.css"))
    .pipe(autoprefixer('last 5 versions'))
    .pipe(minifyCss())
    // .pipe(rename("bundle.min.css"))
    .pipe(gulp.dest('../mad-design'))
    // .pipe(notify('CSS Готов!'));
});

// css
gulp.task('sanitary', function () {
  return gulp.src([
      'css/sanitary/sanitary.css',
    ])
    .pipe(concatCss("sanitary.css"))
    .pipe(autoprefixer('last 5 versions'))
    .pipe(minifyCss())
    .pipe(gulp.dest('../mad-design'))
    // .pipe(notify('CSS Готов!'));
});

// img 
gulp.task('img', function () {
  return gulp.src(['images_old/*.png', 'images_old/*.jpg'])
    .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant({quality: '65-80', speed: 4})]
    }))
    .pipe(gulp.dest('img'));
});

//js 
gulp.task('js', function () {
  return gulp.src([
      'js/jquery-3.3.1.min.js',
      'js/popper.min.js',
      'js/bootstrap.min.js',
      'js/custom.js'
    ])
    .pipe(concat("bundle.js"))
    .pipe(uglify())
    .pipe(rename("bundle.min.js"))
    .pipe(gulp.dest('js/'))
    // .pipe(notify('JS Готов!'));
});

gulp.task('watch', function () {
  gulp.watch('css/**/*.css', ['css']);
  // gulp.watch('images/*', ['img']);
  // gulp.watch('js/**/*.js', ['js']);
});
gulp.task('watch_sanitary', function () {
  gulp.watch('css/**/*.css', ['sanitary']);
});

// default
gulp.task('default', ['css', 'js']);