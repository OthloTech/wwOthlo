//package
const gulp = require('gulp');
const sass = require('gulp-sass');//sassをコンパイルするパッケージ
const sassLint = require('gulp-sass-lint');//sass-lint
const csso = require('gulp-csso');//cssを少量化,インライン化
const autoprefixer = require('gulp-autoprefixer');//can I useで判断しベンダープレフィックスをつけてくれるパッケージ
const imagemin = require('gulp-imagemin');//画像を圧縮するためのプラグイン
const frontNote = require('gulp-frontnote'); //スタイルガイド作成

//path
const SCSS_SRC = './src/scss/**/*.scss';
const CSS_DEST = '../public/css';

// gulp
gulp.task('watch', function(){
  gulp.watch(SCSS_SRC, ['style']);
});

// gulp script
gulp.task('script', function() {
  gulp.src('./src/js/*.js')
    .pipe(babel())
    .pipe(gulp.dest('../public/js'))
});


//'gulp style'
gulp.task('style', function(){
  gulp.src(SCSS_SRC)
    .pipe(sass())
    .pipe(sassLint({'config': '.scss-lint.yml'}))
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
    .pipe(autoprefixer({
        browsers: ['last 2 version', 'iOS >= 8.1', 'Android >= 4.4'],
        cascade: false
    }))

    //cssの最適化
    .pipe(csso())
    .pipe(gulp.dest(CSS_DEST))
});

//gulp img
gulp.task('img', function(){
  //jpg画像の圧縮
  gulp.src('./src/images/*.jpg')
    .pipe(imagemin())
    .pipe(gulp.dest('../public/images'));
  //png画像の圧縮
  gulp.src('./src/images/*.png')
    .pipe(imagemin())
    .pipe(gulp.dest('../public/images'));
})

//gulp guide
gulp.task('guide',function(){
  gulp.src(SCSS_SRC)
    .pipe(frontNote({
      out: './guide'
    }))
})
　
