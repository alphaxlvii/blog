<?php


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//Route::group(['middleware' => ['web']], function () {
    //
//});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    foreach(glob( base_path('/modules/*/Route/*.php') ) as $route){
        require $route;
    }
    Route::get('admin/login', '\\Modules\\Admin\\Controller\\AuthController@getLogin');
    Route::post('admin/login', '\\Modules\\Admin\\Controller\\AuthController@postLogin');
    Route::get('admin/logout', '\\Modules\\Admin\\Controller\\AuthController@getLogout');
    // 注册路由...
    Route::get('admin/register', 'Auth\AuthController@getRegister');
    Route::post('admin/register', 'Auth\AuthController@postRegister');
});

