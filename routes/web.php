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

Route::get('/', 'WelcomeController@index')->name('index');
Route::get('/getmarketindex', 'WelcomeController@getmarketindex')->name('getmarketindex');
Route::get('/getmarketindexidx', 'WelcomeController@getmarketindexidx')->name('getmarketindexidx');
Route::get('/getmarketindexstockidx', 'WelcomeController@getmarketindexstockidx')->name('getmarketindexstockidx');
Route::get('/getmarketindexnyse', 'WelcomeController@getmarketindexnyse')->name('getmarketindexnyse');
Route::get('/getmarketindexstocknyse', 'WelcomeController@getmarketindexstocknyse')->name('getmarketindexstocknyse');
Route::get('/getmarketindexsti', 'WelcomeController@getmarketindexsti')->name('getmarketindexsti');
Route::get('/getmarketindexstocksti', 'WelcomeController@getmarketindexstocksti')->name('getmarketindexstocksti');
Route::get('/getmarketindexhsi', 'WelcomeController@getmarketindexhsi')->name('getmarketindexhsi');
Route::get('/getmarketindexstockhsi', 'WelcomeController@getmarketindexstockhsi')->name('getmarketindexstockhsi');
Route::get('/getmarketindexasx', 'WelcomeController@getmarketindexasx')->name('getmarketindexasx');
Route::get('/getmarketindexstockasx', 'WelcomeController@getmarketindexstockasx')->name('getmarketindexstockasx');
