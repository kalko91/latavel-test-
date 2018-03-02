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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/invite', 'InviteController@index')->name('invite');
//localhost:8000/telegramjoin?telegram_id=155725128
Route::get('/telegramjoin', 'InviteController@joinGroup')->name('joingroup');
//localhost:8000/telegramleft?telegram_id=155725128
Route::get('/telegramleft', 'InviteController@leftGroup')->name('joingroup');
