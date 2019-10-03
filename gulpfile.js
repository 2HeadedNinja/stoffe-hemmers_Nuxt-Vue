const gulp          = require('gulp');
const sass          = require('gulp-sass');
      sass.compiler = require('node-sass');

const concat        = require('gulp-concat');
const cleanCSS      = require('gulp-clean-css');
const autoprefixer  = require('gulp-autoprefixer');

const postcss                 = require('gulp-postcss');
const postcssCustomProperties = require('postcss-custom-properties');

gulp.task('scss',() => {
  return new Promise((resolve,reject) => {
    gulp.src('./source/css/build.scss')
      .pipe(sass().on('error', sass.logError))
      .pipe(autoprefixer('last 8 versions'))
      .pipe(
        postcss([
          postcssCustomProperties()
        ])
      )
      .pipe(cleanCSS())
      .pipe(concat('build.min.css'))
      .pipe(gulp.dest('./assets/css'))

    resolve();
  });
});

gulp.task('watch',() => {
  return new Promise((resolve,reject) => {
    gulp.watch('./source/css/**/*.scss',gulp.parallel('scss'));
    resolve();
  });
});

gulp.task('default',gulp.parallel('watch'));
