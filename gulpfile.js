var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');

gulp.task('default', function(){
  gulp.watch(['./lib/less/events.less'], ['less']);
})

gulp.task('less', function () {
  return gulp.src('./lib/less/robostyle.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./lib/css'));
});
