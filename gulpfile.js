var gulp = require('gulp');
var uglify = require('gulp-uglify');
var rev = require('gulp-rev');
var revCollector = require('gulp-rev-collector');
var cleanCSS = require('gulp-clean-css');
var htmlmin = require('gulp-htmlmin');

var paths = {
    css: "css/*.css",
    js: "js/*.js",
    html: "./*.blade.php"

};
var dist = "./dist/";   //写的很简单，都发布到dist下。在laravel下可以配置不同文件类型的发布路径。

gulp.task('compressHtml',['rev'],function () {
    var options = {
        removeComments: true,//清除HTML注释
        removeScriptTypeAttributes: true,//删除`<script>`的type="text/javascript"
        removeStyleLinkTypeAttributes: true,//删除`<style`>和`<link>`的type="text/css"
        minifyCSS: true,//压缩页面CSS
        collapseWhitespace: true,
        minifyJS: true,
    };
    return gulp.src(dist+'*.blade.php')
        .pipe(htmlmin(options))
        .pipe(gulp.dest(dist));
});

gulp.task('concatCss',function() {                                //- 创建一个名为 concat 的 task
    return gulp.src(paths.css)  //- 需要处理的css文件，放到一个字符串数组里
        .pipe(rev())                                           //- 文件名加MD5后缀
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest(dist+'css/'))                              //- 输出文件本地
        .pipe(rev.manifest())                                  //- 生成一个rev-manifest.json
        .pipe(gulp.dest('./rev/css'));                            //- 将 rev-manifest.json 保存到 rev 目录内

});
gulp.task('concatJs', function() {                                //- 创建一个名为 concat 的 task
    return gulp.src(paths.js)  //- 需要处理的css文件，放到一个字符串数组里
        .pipe(rev())                                           //- 文件名加MD5后缀
        .pipe(uglify())
        .pipe(gulp.dest(dist+"js/"))
        .pipe(rev.manifest())                                  //- 生成一个rev-manifest.json
        .pipe(gulp.dest('./rev/js'));                            //- 将 rev-manifest.json 保存到 rev 目录内

});
gulp.task('rev' , ['concatCss', 'concatJs'],function() {
    return gulp.src(['./rev/**/*.json', paths.html])   //- 读取 rev-manifest.json 文件以及需要进行css，js名替换的文件
        .pipe(revCollector(
            {
                replaceReved: true,
                dirReplacements: {
                    'css': 'css',  //这里是把文件中的css换成别的字符串，可以拼接发布目录
                    'js': 'js',    //道理同上
                }
            }
        ))                                 
        .pipe(gulp.dest(dist));                 

});

gulp.task('default', ['compressHtml']);
