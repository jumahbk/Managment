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
Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);
    return redirect('/title/1/edit');
    //
});
Route::get('/lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/title/batch', 'TitleController@batch')->name('titlebatch');

Route::resource('employee','EmployeeController');
Route::resource('title','TitleController');

Route::get('/home', 'HomeController@index')->name('home');
