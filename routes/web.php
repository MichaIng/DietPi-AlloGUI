<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

 // Auth Get Routes
// Route::group(array('prefix' => '/allo'), function()
// {
    Route::get('/', 'AccountController@Index');
    //Route::any('/ssh-login', 'AccountController@ssh_login');
    Route::any('/user/mpd_settings', 'UserController@mpdSettings');
    Route::any('/user/system_settings', 'UserController@systemSettings');
    Route::any('/user/changeSystemSettings', 'UserController@changeSystemSettings');
    Route::any('/user/changeMpdSettings', 'UserController@changeMpdSettings');
    Route::any('/user/roon_settings', 'UserController@roonSettings');
    Route::any('/user/changeRoonSettings', 'UserController@changeRoonSettings');
    Route::any('/user/gmrender_settings', 'UserController@gmrenderSettings');
    Route::any('/user/changeGmrenderSettings', 'UserController@changeGmrenderSettings');
    Route::any('/user/netdata_settings', 'UserController@netdataSettings');
    Route::any('/user/changeNetdataSettings', 'UserController@changeNetdataSettings');
    Route::any('/user/squeezelite_settings', 'UserController@squeezeliteSettings');
    Route::any('/user/changeSqueezeliteSettings', 'UserController@changeSqueezeliteSettings');
    Route::any('/user/shair_port_settings', 'UserController@shairPortSettings');
    Route::any('/user/changeShairPortSettings', 'UserController@changeShairPortSettings');
    Route::any('/user/daemon_settings', 'UserController@daemonSettings');
    Route::any('/user/changeDaemonSettings', 'UserController@changeDaemonSettings');
    Route::any('/user/wifi_settings', 'UserController@wifiSettings');
    Route::any('/user/changeWifiSettings', 'UserController@changeWifiSettings');
    Route::any('/user/download', 'UserController@download');
    Route::any('/user/status', 'UserController@status');
    Route::any('/user/reeboot', 'UserController@reeboot');
    Route::any('/user/swapFileSize', 'UserController@swapFileSize');
    Route::any('/user/power', 'UserController@power');
    Route::any('/user/updateSoundCard', 'UserController@updateSoundCard');
    //Route::any('/resetPassword/reset', 'Auth\ResetPasswordController@reset');
    //Route::any('/userListImport/getFile', 'UserListImportController@getFile');
    Route::post('/user/updateDietPi', 'UserController@updateDietPi');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
