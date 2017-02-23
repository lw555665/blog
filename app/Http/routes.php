<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//首页
Route::resource('/','HomeController');

Route::get('/list/{id}','HomeController@show');
//注册
Route::resource('/register','RegisterController');

//登录
Route::resource('/login','LoginController');

Route::get('/logout','LoginController@logout');



//个人中心验证
Route::group(['middleware'=>'UserMiddleware'],function(){

    //个人中心首页

    Route::resource('/user','UserController');
    //文章curd
    Route::resource('/curd','CurdController');
});