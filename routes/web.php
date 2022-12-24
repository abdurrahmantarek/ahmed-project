<?php

use Illuminate\Support\Facades\DB;
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

Route::group([], function () {
    Route::get('/', [\App\Http\Controllers\SiteController::class, 'redirectToProjects'])->name('redirectToProjects');
    Route::get('/projects', [\App\Http\Controllers\SiteController::class, 'home'])->name('home');
    Route::get('/login', '\App\Http\Controllers\SiteController@login')->name('login');
    Route::post('/login', '\App\Http\Controllers\SiteController@loginData')->name('login.data');
    Route::get('/logout', '\App\Http\Controllers\SiteController@logout')->name('logout');
    Route::get('/step1', '\App\Http\Controllers\SiteController@step1')->name('step1');
    Route::get('/step2', '\App\Http\Controllers\SiteController@step2')->name('step2');
    Route::get('/step3', '\App\Http\Controllers\SiteController@step3')->name('step3');
    Route::get('/step4', '\App\Http\Controllers\SiteController@step4')->name('step4');
    Route::get('/rules', '\App\Http\Controllers\SiteController@rules')->name('rules');
    Route::get('/reserve/{id}', '\App\Http\Controllers\SiteController@reserve')->name('reserve');
    Route::get('/reserve-button', '\App\Http\Controllers\SiteController@reserveButtonStatus')->name('reserve.button');
    Route::get('/maintenance-mode', '\App\Http\Controllers\SiteController@maintenanceWebsite')->name('close');
});

Route::get('/open', '\App\Http\Controllers\SiteController@openWebsite')->name('open');
Route::view('/control', 'site.buttons');
