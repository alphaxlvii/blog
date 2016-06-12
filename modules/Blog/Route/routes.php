<?php

use Libs\Management\HelperManagement;
use Libs\Utils\Sys;
/* Route::get('/', function () {
    return HelperManagement::_view('blog.index.welcome');
}); */



//Route::get('/{nav?}/{slug?}', Sys::action('Blog.IndexController@Index'));
Route::get('/', Sys::action('Blog.IndexController@Index'));
Route::get('/about', Sys::action('Blog.IndexController@showAbout'));
Route::get('/{nav?}', Sys::action('Blog.IndexController@Navbar'))->where(['nav' => '^'.config('blog.nav_can_enter').'$']);
Route::get('/post/{slug?}', Sys::action('Blog.IndexController@showPost'));