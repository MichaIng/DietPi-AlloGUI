<?php

use Illuminate\Support\Facades\Route;

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

// Auth Get Routes
// Route::group(array('prefix' => '/allo'), function()
// {
    Route::get('/', '\App\Http\Controllers\AccountController@Index');
    //Route::any('/ssh-login', '\App\Http\Controllers\AccountController@ssh_login');
    Route::any('/user/mpd_settings', '\App\Http\Controllers\UserController@mpdSettings');
    Route::any('/user/system_settings', '\App\Http\Controllers\UserController@systemSettings');
    Route::any('/user/changeSystemSettings', '\App\Http\Controllers\UserController@changeSystemSettings');
    Route::any('/user/changeMpdSettings', '\App\Http\Controllers\UserController@changeMpdSettings');
    Route::any('/user/roon_settings', '\App\Http\Controllers\UserController@roonSettings');
    Route::any('/user/changeRoonSettings', '\App\Http\Controllers\UserController@changeRoonSettings');
    Route::any('/user/gmrender_settings', '\App\Http\Controllers\UserController@gmrenderSettings');
    Route::any('/user/changeGmrenderSettings', '\App\Http\Controllers\UserController@changeGmrenderSettings');
    Route::any('/user/netdata_settings', '\App\Http\Controllers\UserController@netdataSettings');
    Route::any('/user/changeNetdataSettings', '\App\Http\Controllers\UserController@changeNetdataSettings');
    Route::any('/user/squeezelite_settings', '\App\Http\Controllers\UserController@squeezeliteSettings');
    Route::any('/user/changeSqueezeliteSettings', '\App\Http\Controllers\UserController@changeSqueezeliteSettings');
    Route::any('/user/shair_port_settings', '\App\Http\Controllers\UserController@shairPortSettings');
    Route::any('/user/changeShairPortSettings', '\App\Http\Controllers\UserController@changeShairPortSettings');
    Route::any('/user/daemon_settings', '\App\Http\Controllers\UserController@daemonSettings');
    Route::any('/user/changeDaemonSettings', '\App\Http\Controllers\UserController@changeDaemonSettings');
    Route::any('/user/wifi_settings', '\App\Http\Controllers\UserController@wifiSettings');
    Route::any('/user/changeWifiSettings', '\App\Http\Controllers\UserController@changeWifiSettings');
    Route::any('/user/download', '\App\Http\Controllers\UserController@download');
    Route::any('/user/status', '\App\Http\Controllers\UserController@status');
    Route::any('/user/reboot', '\App\Http\Controllers\UserController@reboot');
    Route::any('/user/swapFileSize', '\App\Http\Controllers\UserController@swapFileSize');
    Route::any('/user/power', '\App\Http\Controllers\UserController@power');
    Route::any('/user/updateSoundCard', '\App\Http\Controllers\UserController@updateSoundCard');
    //Route::any('/userListImport/getFile', '\App\Http\Controllers\UserListImportController@getFile');
    Route::post('/user/updateDietPi', '\App\Http\Controllers\UserController@updateDietPi');
//});

Auth::routes();

Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');
