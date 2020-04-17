const { src, dest, watch, series, parallel } = require('gulp');

// Plugins
const del         = require('del'),
      concat      = require('gulp-concat'),
      browerSync  = require('browser-sync'),
      cssmin      = require('gulp-cssmin'),
      imagemin    = require('gulp-imagemin'),
      rename      = require('gulp-rename'),
      sass        = require('gulp-sass'),
      uglify      = require('gulp-uglify'),
      log         = require('fancy-log');

// Configurations
var config        = require('./gulp.config.json');

// Task: Clean:before
// Description: Removing assets files before running other tasks
function cleanBefore() {
  return del([config.assets.dest]);
}

// Task: scripts
// Description: Handle scripts
function scripts() {
  return src(config.scripts.files)
    .pipe(dest(config.scripts.dest))
    .pipe(browerSync.reload({ stream: true }));
}

// Task: fonts
// Description: Handle fonts
function fonts() {
  return src(config.fonts.files)
    .pipe(dest(config.fonts.dest))
    .pipe(browerSync.reload({ stream: true }));
}

// Task: images
// Description: Handle images
function images() {
  return src(config.images.files)
    .pipe(dest(config.images.dest))
    .pipe(browerSync.reload({ stream: true }));
}

// Task: styles
// Description: Handle Sass and CSS
function styles() {
  return src(config.scss.files)
    .pipe(sass(config.sass.options).on('error', sass.logError))
    .pipe(dest(config.scss.dest))
    .pipe(browerSync.reload({ stream: true }));
}

// Task: watchTask
// Description: Watch files
function watchTask() {
  browerSync.init({
    baseDir: './',
    open: false
  });

  var options = {
    ignoreInitial: true,
    usePolling: true,
    events: 'all'
  };

  // Watch scripts
  watch(config.scripts.files, options, scripts);
  // Watch images
  watch(config.images.files, options, images);
  // Watch Sass
  watch(config.scss.files, options, styles);
  // Watch fonts
  watch(config.fonts.files, options, fonts);
}
exports.watchTask = watchTask;

// Task: Build.
// Description: Build all stuff of the project once.
const build = series(cleanBefore, series(fonts, styles, images, scripts));
exports.build = build;

// Task: Default.
// Description: Type 'gulp' in the terminal.
exports.default = series(build, watchTask);
