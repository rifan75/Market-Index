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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/marketindex', 'HomeController@marketindex')->name('marketindex');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//Index Bursa
Route::get('/admin/marketindex', 'MarketindexController@index')->name('adminmarketindex');
Route::get('/getmarketindex1', 'MarketindexController@getmarketindex')->name('getmarketindex1');
Route::post('/marketindexstore', 'MarketindexController@marketindexstore')->name('marketindexstore');
Route::get('/marketindex/{id}/edit', 'MarketindexController@marketindexedit');
Route::patch('/marketindex/{id}/update', 'MarketindexController@marketindexupdate');
Route::delete('/marketindex/{id}', 'MarketindexController@marketindexdelete');

//Company
Route::get('/admin/company', 'CompanyController@index')->name('admincompany');
Route::get('/getcompany', 'CompanyController@getcompany')->name('getcompany');
Route::post('/companystore', 'CompanyController@companystore')->name('companystore');
Route::get('/company/{id}/edit', 'CompanyController@companyedit');
Route::patch('/company/{id}/update', 'CompanyController@companyupdate');
Route::delete('/company/{id}', 'CompanyController@companydelete');

//Upload
Route::get('/admin/upload', 'UploadController@upload')->name('upload');
Route::get('/admin/uploademiten', 'UploadController@uploademiten')->name('uploademiten');
Route::get('/getstock/{id}', 'UploadController@getDaftarStock');
Route::post('/uploadstatstore', 'UploadController@uploadstatstore')->name('uploadstatstore');

//Stock Data
Route::get('/dashboard/stockdata', 'StockdataController@index')->name('stockdata');
Route::get('/dashboard/statfinpos', 'StockdataController@statfinpos')->name('finpos');
Route::get('/getstock/{id}', 'UploadController@getDaftarStock');
Route::post('/uploadstatstore', 'UploadController@uploadstatstore')->name('uploadstatstore');

Auth::routes();
Route::get('/calculators/debt', 'CalculatorController@debt')->name('calculators.debt');

Route::get('/calculators/savings', 'CalculatorController@savings')->name('calculators.savings');
