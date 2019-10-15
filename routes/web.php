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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('employee','EmployeeController');
Route::resource('title','TitleController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{locale}', function ($locale) {
    App::setLocale('ar');
    echo App::isLocale('en');
    //return back();

});