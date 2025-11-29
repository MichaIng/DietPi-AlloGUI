<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;

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

# Authentication
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

# Dashboard
Route::get('/', [AccountController::class, 'Index']);

# Pages and buttons
Route::prefix('user')->group(function ()
{
    Route::any('system_settings', [UserController::class, 'systemSettings']);
    Route::any('changeSystemSettings', [UserController::class, 'changeSystemSettings']);
    Route::any('mpd_settings', [UserController::class, 'mpdSettings']);
    Route::any('changeMpdSettings', [UserController::class, 'changeMpdSettings']);
    Route::any('roon_settings', [UserController::class, 'roonSettings']);
    Route::any('changeRoonSettings', [UserController::class, 'changeRoonSettings']);
    Route::any('gmrender_settings', [UserController::class, 'gmrenderSettings']);
    Route::any('changeGmrenderSettings', [UserController::class, 'changeGmrenderSettings']);
    Route::any('netdata_settings', [UserController::class, 'netdataSettings']);
    Route::any('changeNetdataSettings', [UserController::class, 'changeNetdataSettings']);
    Route::any('squeezelite_settings', [UserController::class, 'squeezeliteSettings']);
    Route::any('changeSqueezeliteSettings', [UserController::class, 'changeSqueezeliteSettings']);
    Route::any('shair_port_settings', [UserController::class, 'shairPortSettings']);
    Route::any('changeShairPortSettings', [UserController::class, 'changeShairPortSettings']);
    Route::any('daemon_settings', [UserController::class, 'daemonSettings']);
    Route::any('changeDaemonSettings', [UserController::class, 'changeDaemonSettings']);
    Route::any('wifi_settings', [UserController::class, 'wifiSettings']);
    Route::any('changeWifiSettings', [UserController::class, 'changeWifiSettings']);
    Route::any('status', [UserController::class, 'status']);
    Route::any('download', [UserController::class, 'download']);
    Route::any('reboot', [UserController::class, 'reboot']);
    Route::any('power', [UserController::class, 'power']);
    Route::any('swapFileSize', [UserController::class, 'swapFileSize']);
    Route::any('updateSoundCard', [UserController::class, 'updateSoundCard']);
    Route::post('updateDietPi', [UserController::class, 'updateDietPi']);
});
