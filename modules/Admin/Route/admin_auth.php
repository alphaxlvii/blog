<?php
// 认证路由...
Route::get('auth/login', '\\Modules\\Admin\\Controller\\AuthController@getLogin');
Route::post('auth/login', '\\Modules\\Admin\\Controller\\AuthController@postLogin');
Route::get('auth/logout', '\\Modules\\Admin\\Controller\\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');