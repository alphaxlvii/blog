<?php
use Libs\Utils\Sys;
Route::get('/admin', Sys::action('Admin_blog.IndexController@Index'));