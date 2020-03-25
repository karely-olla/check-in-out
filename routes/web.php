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

Route::get('/', function () {
    return view('welcome');
})->name('checador');

Route::resource('users', 'UserController');
Route::resource('schedules', 'ScheduleController');
Route::resource('employes', 'EmployeController');
Route::resource('inouts', 'InOutController');
Route::get('tbl/inouts','InOutController@table');
Route::resource('delays', 'DelayController');
Route::resource('hoursextras', 'HourExtraController');
Route::get('tbl/hoursextras','HourExtraController@table');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
