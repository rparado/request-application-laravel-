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

/*====================Admin Dashboard========================*/
//Route::get('/', 'Admin\DashboardController@index');

/*====================Pages Controller=======================*/
Route::get('admin/dashboard', 'PagesController@dashboard');
Route::get('admin/request', 'PagesController@request');
Route::get('admin/setting/user', 'PagesController@user');
Route::get('admin/setting/user/index', 'Admin\DepartmentListController@index');
Route::get('admin/setting/department', 'PagesController@department');
Route::get('admin/setting/department/index', 'Admin\DepartmentController@create');
Route::get('admin/setting/service', 'PagesController@service');
Route::get('admin/setting/service/index', 'Admin\ServiceController@create');

//client
Route::get('client/dashboard', 'PagesController@clientDashboard');
Route::get('client/request/', 'PagesController@clientRequest');
Route::get('client/request/index', 'Client\RequestController@create');
/*===================login Routes=============================*/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
//Route::group(['prefix' => 'admin', 'middleware' => 'users'], function () {
//	Route::get('/', 'Admin\DashboardController@index');
//});
//Route::auth();
//Route::get('/', 'HomeController@index');

// Route::auth();
// Route::get('/', 'HomeController@index');

Route::group(array('before' => 'auth', 'middleware' => 'web'), function(){
	Route::auth();
    Route::get('/', 'HomeController@index');
	Route::get('admin/dashboard', 'PagesController@dashboard');
});
    //Route::get('/', 'HomeController@index');
/*===================Export===================================*/
Route::get('admin/export/{type}', 'Admin\ExportController@downloadExcel');
Route::post('admin/downloadCSV', 'Admin\ExportController@downloadCSV');

/*=================RESTFull Controllers======================*/
Route::resource('admin/dashboard', 'Admin\DashboardController');
Route::resource('admin/setting/user', 'Admin\UserController');
Route::resource('admin/setting/department', 'Admin\DepartmentController');
Route::resource('admin/setting/service', 'Admin\ServiceController');


Route::resource('client/dashboard', 'Client\DashboardController');
//Route::get('client/request/index', 'Client\RequestController@getLastInsertId');

Route::resource('client/request', 'Client\RequestController');
/*================AJAX POST Controllers=============================*/
Route::get('client/request/index/{id}','Admin\ServiceController@getServiceItem');
//Route::post('client/request/index/{id}','Admin\DepartmentController@geDepartmentItem');

