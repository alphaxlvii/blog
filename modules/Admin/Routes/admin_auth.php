<?php

Route::get('/home', 'HomeController@index');
Route::get('admin/login', '\\Modules\\Admin\\Controllers\\AuthController@getLogin');
Route::post('admin/login', '\\Modules\\Admin\\Controllers\\AuthController@postLogin');
Route::get('admin/logout', '\\Modules\\Admin\\Controllers\\AuthController@getLogout');
// 注册路由...
Route::get('admin/register', 'Auth\AuthController@getRegister');
Route::post('admin/register', 'Auth\AuthController@postRegister');