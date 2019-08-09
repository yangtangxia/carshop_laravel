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

Route::get('/', function () {
    return view('welcome');
});

// 前端路由
Route::get('home/index/index', 'Home\IndexController@index');

// 后台路由

Route::get('admin', 'Admin\IndexController@index');//首页

Route::get('admin/cate/index', 'Admin\CateController@index');// 栏目路由
Route::get('admin/cate/create', 'Admin\CateController@create'); // 添加
Route::post('admin/cate/add', 'Admin\CateController@add'); // 添加执行
Route::get('admin/cate/edit', 'Admin\CateController@edit'); // 编辑
Route::post('admin/cate/update', 'Admin\CateController@update'); // 编辑执行
Route::get('admin/cate/delete', 'Admin\CateController@delete'); // 删除
