<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home模块
Route::group(['namespace' => 'Home'], function(){
    //首页
    Route::get('/', 'IndexController@index');
});

//Admin模块
Route::group(['namespace' => 'Admin'], function(){
    //首页
    Route::get('/admin/index/index', 'IndexController@index');
    //文章列表
    Route::get('/admin/article/index', 'ArticleController@index');
});


