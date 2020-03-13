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
Route::resource('delays', 'DelayController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
