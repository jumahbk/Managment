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
Route::get('/employees/batch', 'EmployeeController@batch')->name('employeebatch');
Route::resource('units','UnitController');
Route::get('/vendors/{id}/deactivate', 'VendorController@deactivate');
Route::get('/vendors/{id}/activate', 'VendorController@activate');

Route::get('/nationalities/batch', 'NationalityController@batch')->name('nationalitybatch');
Route::get('/types/batch', 'TypeeController@batch')->name('typebatch');
Route::resource('types','TypeController');
Route::resource('nationalities','NationalityController');
Route::resource('employees','EmployeeController');
Route::resource('companies','CompanyController');
Route::resource('vendors','VendorController');

Route::get('/lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/title/batch', 'TitleController@batch')->name('titlebatch');


Route::resource('employee','EmployeeController');
Route::resource('title','TitleController');

Route::get('/home', 'HomeController@index')->name('home');
