import gulp from 'gulp';
import stylus from 'gulp-stylus';
import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import sourcemaps from 'gulp-sourcemaps';

const paths = {
  styles: {
    src: 'resources/styl/main.styl',
    dest: 'public/css',
  },
  scripts: {
    src: [
      'node_modules/jquery/dist/jquery.min.js',
      'resources/js/theme.js',
      'resources/js/header.js',
      'resources/js/filters.js',
      'resources/js/contact.js',
      'resources/js/animations.js',
      'resources/js/main.js',
    ],
    dest: 'public/js',
  },
};

export function styles() {
  return gulp.src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(stylus())
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.styles.dest));
}

export function scripts() {
  return gulp.src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.scripts.dest));
}

export function watch() {
  gulp.watch('resources/styl/**/*.styl', styles);
  gulp.watch('resources/js/**/*.js', scripts);
}

export const build = gulp.series(styles, scripts);
export default gulp.series(build, watch);