/* Gulp vers.4 */
const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const cleanCss = require('gulp-clean-css');
const uglify = require('gulp-uglify-es').default;
const imagemin = require('gulp-imagemin');
const newer = require("gulp-newer");
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');

// compile scss into css
function style() {
    return gulp
        // 1. where are my sccs files
        .src('src/styles/**')
        .pipe(sourcemaps.init({loadMaps: true}))
        // 2. pass that file through sass compiler (gulp-sass)
        .pipe(sass().on('error', sass.logError))
        // 3. add CSS prefix with Autoprefixer
        .pipe(autoprefixer('last 2 versions'))
        // 4. concat all the scss files into 1 (gulp-concat)
        .pipe(concat('style.css'))
        // 5. minify this file (gulp-clean-css)
        .pipe(cleanCss())
        // 6. rename file with .min extension
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('./'))
        // 7. where do I save the compiled CSS?
        .pipe(gulp.dest('./dist/styles/'))
        // 8. stream changes to ALL browsers (browser-sync)
        .pipe(browserSync.stream());
}

// Optimize JS files
function scripts() {
    return gulp
        // 1. where are my js files
        .src('src/js/*.*')
        // 2. concat all the js files into 1 (gulp-concat)
        .pipe(concat('javascript.js'))
        // 3. minify this file (gulp-uglify-es)
        .pipe(uglify().on('error', function(e){console.log(e);}))
        // 4. rename file with .min extension
        .pipe(rename({ suffix: '.min' }))
        // 5. where do I save the compiled JS?
        .pipe(gulp.dest('./dist/js'))
}

// Optimize Images
function images() {
  return gulp
    .src("src/img/**/*")
    .pipe(newer("./dist/img"))
    .pipe(
        imagemin(
            [
          imagemin.gifsicle({ interlaced: true }),
          imagemin.jpegtran({ progressive: true }),
          imagemin.optipng({ optimizationLevel: 5 }),
          imagemin.svgo({
            plugins: [
              {
                removeViewBox: false,
                collapseGroups: true
              }
            ]
          })
        ]
        )
      )
    .pipe(gulp.dest("./dist/img"));
}

function watch() {
    browserSync.init({
        proxy: "http://localhost:8888/antoninolattene.com/",
        notify: true,
        browser: "firefox"
    });
    gulp.watch('src/styles/**', style);
    gulp.watch('./*.php').on('change', browserSync.reload);
    gulp.watch('src/js/*.*', scripts).on('change', browserSync.reload);
    gulp.watch("src/img/**/*", images);
}



exports.style = style;
exports.scripts = scripts;
exports.images = images;
exports.watch = watch;