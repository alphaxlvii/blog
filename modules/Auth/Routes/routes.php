<?php
use Libs\Utils\Sys;
//--------- 登录路由 ----------//
Route::get('auth/login', Sys::action('Auth.AuthController@getLogin', ['as'=>'auth.login']) );
Route::post('auth/login', Sys::action('Auth.AuthController@postLogin', ['as'=>'auth.login']) );
Route::get('auth/logout', '\\Modules\\Auth\\Controllers\\AuthController@getLogout');
//--------- 注册路由 ----------//
Route::get('auth/register', '\\Modules\\Auth\\Controllers\\AuthController@getRegister');
Route::post('auth/register', '\\Modules\\Auth\\Controllers\\AuthController@postRegister');

//--------- 验证路由 ----------//
Route::post('register/validate/email', '\\Modules\\Auth\\Controllers\\AuthController@postValidateEmail');

//Route::get('password/reset', '\\Modules\\Admin\\Controller\\PasswordController@getEmail');
//Route::post('password/email', '\\Modules\\Admin\\Controller\\PasswordController@postEmail');

//---------- 密码重置链接请求路由 ----------//
Route::get('password/email', '\\Modules\\Auth\\Controllers\\PasswordController@getEmail');
Route::post('password/email', '\\Modules\\Auth\\Controllers\\PasswordController@postEmail');
//------------- 密码重置路由 -----------//
Route::get('password/reset/{token}', '\\Modules\\Auth\\Controllers\\PasswordController@getReset');
Route::post('password/reset', '\\Modules\\Auth\\Controllers\\PasswordController@postReset');