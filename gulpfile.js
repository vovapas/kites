'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require("gulp-rename");
var notify = require("gulp-notify");
var browserSync = require('browser-sync');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var lost = require('lost');
var webpackStream = require('webpack-stream');
var webpack = require('webpack');

gulp.task('styles', function(){
	return gulp.src('./resources/assets/sass/site/main.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(rename('main.min.css'))
        .pipe(postcss([
            lost(),
            autoprefixer()
        ]))
		.pipe(gulp.dest('./public_html/css'))
		.pipe(browserSync.stream())
		.pipe(notify("Well Done!"));
});


gulp.task('styles-admin', function(){
	return gulp.src('./resources/assets/sass/admin/admin.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(rename('admin.min.css'))
		.pipe(gulp.dest('./public_html/css'))
		.pipe(browserSync.stream())
		.pipe(notify("Well Done styles-admin!"));
});


gulp.task('scripts', function() {
    return gulp.src('./resources/assets/js/site/main.js')
        .pipe(webpackStream({
            module: {
                rules: [                  
                    {
                      test: /\.js$/,
                      loader: 'babel-loader',
                      exclude: /node_modules/
                    },
                    {
                      test: /\.(png|jpg|gif|svg)$/,
                      loader: 'file-loader',
                      options: {
                        name: '[name].[ext]?[hash]'
                      }
                    }
                ]               
            },       
            output: {
                filename: 'main.min.js'
            },
            plugins: [new webpack.optimize.UglifyJsPlugin()]
        }, webpack))      
        .pipe(gulp.dest('public_html/js'))
        .pipe(browserSync.stream())
        .pipe(notify("Well Done script!"));
});

gulp.task('scripts-admin', function() {
    return gulp.src('./resources/assets/js/admin/admin.js')
        .pipe(webpackStream({          
            module: {
                rules: [                  
                    {
                      test: /\.js$/,
                      loader: 'babel-loader',
                      exclude: /node_modules/
                    },
                    {
                      test: /\.(png|jpg|gif|svg)$/,
                      loader: 'file-loader',
                      options: {
                        name: '[name].[ext]?[hash]'
                      }
                    }
                ] 
            },       
            output: {
                filename: 'admin.min.js'
            },
            plugins: [new webpack.optimize.UglifyJsPlugin()]
        }, webpack))      
        .pipe(gulp.dest('public_html/js'))
        .pipe(browserSync.stream())
        .pipe(notify("Well Done script-admin!"));
});

gulp.task('watch', ['styles', 'styles-admin', 'scripts', 'scripts-admin'], function () {
    browserSync.init({
        proxy: 'kites.kz.dev'
    });
    gulp.watch('./resources/assets/sass/site/**/*.scss', ['styles']);
    gulp.watch('./resources/assets/sass/admin/**/*.scss', ['styles-admin']);
    gulp.watch('./resources/assets/js/site/**/*.js', ['scripts']);
    gulp.watch('./resources/assets/js/admin/**/*.js', ['scripts-admin']);
    gulp.watch('./resources/views/**/*.php').on('change', browserSync.reload);
});
