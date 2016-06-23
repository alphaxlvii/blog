<?php
use Libs\Utils\Sys;
Route::get('/upload', Sys::action('Admin_Upload.IndexController@Index'));