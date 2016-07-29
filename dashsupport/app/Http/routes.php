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
Route::get('admin/support/duedate', 'Admin\SupportController@getDueDates');

Route::get('client/chat', 'PagesController@chat');

Route::get('client/dashboard', 'PagesController@clientDashboard');
Route::get('client/request', 'PagesController@clientRequest');
Route::get('client/request/index', 'Client\RequestController@create');
Route::get('client/request', 'Client\RequestController@cancelled');
Route::get('client/request/submitted', 'Client\RequestController@getSubmittedRequests');
Route::get('client/request/cancelled', 'Client\RequestController@getCancelledRequests');
Route::get('client/support/closed', 'Admin\SupportController@getClosedSupportItems');
Route::get('client/support/inprogress', 'Admin\SupportController@getInProgressSupportItems');
Route::get('client/support/onhold', 'Admin\SupportController@getOnHoldSupportItems');
//Route::get('client/request/{id}', array('as' => 'cancel', 'uses' => 'Client\RequestController@cancel'));
/*===================login Routes=============================*/
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);

Route::group(array('before' => 'auth', 'middleware' => 'web'), function(){
	Route::auth();
    Route::get('/', 'Client\DashboardController@index');
	Route::get('admin/dashboard', 'PagesController@dashboard');
	Route::get('client/dashboard', 'PagesController@clientDashboard');
	
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
Route::resource('admin/support', 'Admin\SupportController');

Route::resource('client/dashboard', 'Client\DashboardController');
Route::resource('client/request', 'Client\RequestController');
/*================AJAX POST Controllers=============================*/
Route::get('client/request/index/{id}','Admin\ServiceController@getServiceItem');
//Route::post('client/request/index/{id}','Admin\DepartmentController@geDepartmentItem');
Route::get('redirect', 'SocialAuthController@redirect');
Route::get('callback', 'SocialAuthController@callback');

Route::get('client/user/profileupdate', 'Client\ProfileUpdate@index');
Route::patch('client/user/profileupdate/{id}',[
	'as' => 'client.user.profileupdate',
	'uses' => 'Client\ProfileUpdate@update'
]);
//Route::post('client/chat/sendmessage', 'chatController@sendMessage');
//Route::post('client/chat/sendmessage', 'EmailController@send');

Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});