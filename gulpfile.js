const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();

// **SCSSをCSSにコンパイル & ブラウザを更新**
gulp.task('sass', function () {
  console.log("SCSSが変更されました。コンパイルを開始します...");
  return gulp.src('assets/sass/**/*.scss') // SCSSファイルの場所
    .pipe(sass().on('error', sass.logError)) // エラーを表示
    .pipe(gulp.dest('assets/css')) // CSSを出力
    .pipe(browserSync.stream()) // ✅ ブラウザを更新
    .on('end', () => console.log("CSSが更新されました！"));
});

// **ローカルサーバーを起動 & ファイル変更を監視**
gulp.task('serve', function () {
  browserSync.init({
    proxy: "http://a-tech2.local", // ✅ プロキシのURLが正しいか確認
    notify: false,
    open: false,
    port: 3000, // ✅ 指定ポートを明示
    cache: false, // ✅ キャッシュを無効化
    serveStaticOptions: {
      extensions: ["css"]
    }  
  });


  // **CSSファイルの変更を検知し、ブラウザを更新**
  gulp.watch("assets/sass/**/*.scss", gulp.series('sass', (done) => {
    browserSync.reload();
    done();
  }));
  

  // **JSファイルの変更を検知し、ブラウザを更新**
  gulp.watch("assets/js/**/*.js").on('change', browserSync.reload);

  // **PHPファイルの変更を検知し、ブラウザを更新**
  gulp.watch("./**/*.php").on('change', browserSync.reload);
});

// **デフォルトタスク**
gulp.task('default', gulp.series('sass', 'serve'));
