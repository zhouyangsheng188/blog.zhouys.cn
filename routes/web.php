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
    //编辑文章
    Route::get('/admin/article/edit/{id}', 'ArticleController@edit')->where('id','[0-9]+');
    //新建文章
    Route::get('/admin/article/create', 'ArticleController@create');
    //上传文章图片
    Route::post('/admin/article/storeArticleImage', 'ArticleController@storeArticleImage');
    //保存文章
    Route::post('/admin/article/store', 'ArticleController@store');
    //分类列表
    Route::get('/admin/category/index', 'CategoryController@index');
});


