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
Auth::routes();
Route::post('/stock/move','StockController@request' )->middleware('auth');
Route::get('/stock/requested', 'StockController@requested')->middleware('auth');

Route::get('/stock/batchlist', 'StockController@batchlist')->middleware('auth');
Route::get('/stock/productlist', 'StockController@productlist')->middleware('auth');

Route::get('/stock/move', 'StockController@move')->middleware('auth');




Route::get('/stock/{id}/product', 'StockController@product')->middleware('auth');

Route::get('/employees/{id}/deactivate', 'EmployeeController@deactivate')->middleware('auth');
Route::get('/employees/{id}/activate', 'EmployeeController@activate')->middleware('auth');;

Route::get('/warehouses/{id}/deactivate', 'WarehouseController@deactivate')->middleware('auth');;
Route::get('/warehouses/{id}/activate', 'WarehouseController@activate')->middleware('auth');;

Route::get('/branches/{id}/deactivate', 'BranchController@deactivate')->middleware('auth');;
Route::get('/branches/{id}/activate', 'BranchController@activate')->middleware('auth');;

Route::get('/products/{id}/deactivate', 'ProductController@deactivate')->middleware('auth');;
Route::get('/products/{id}/activate', 'ProductController@activate')->middleware('auth');;

Route::resource('stock','StockController')->middleware('auth');;

Route::resource('products','ProductController')->middleware('auth');;
Route::resource('branches','BranchController')->middleware('auth');;
Route::resource('warehouses','WarehouseController')->middleware('auth');;

Route::get('/employees/batch', 'EmployeeController@batch')->name('employeebatch')->middleware('auth');;
Route::resource('units','UnitController')->middleware('auth');;
Route::get('/vendors/{id}/deactivate', 'VendorController@deactivate')->middleware('auth');;
Route::get('/vendors/{id}/activate', 'VendorController@activate')->middleware('auth');;

Route::get('/nationalities/batch', 'NationalityController@batch')->name('nationalitybatch')->middleware('auth');;
Route::get('/types/batch', 'TypeeController@batch')->name('typebatch')->middleware('auth');;
Route::resource('types','TypeController')->middleware('auth');;
Route::resource('nationalities','NationalityController')->middleware('auth');;
Route::resource('employees','EmployeeController')->middleware('auth');;
Route::resource('companies','CompanyController')->middleware('auth');;
Route::resource('vendors','VendorController')->middleware('auth');;

Route::get('/lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang'])->middleware('auth');;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');;


Route::get('/title/batch', 'TitleController@batch')->name('titlebatch')->middleware('auth');;


Route::resource('employee','EmployeeController')->middleware('auth');;
Route::resource('title','TitleController')->middleware('auth');;

Route::get('/home', 'StockController@index')->name('home')->middleware('auth');;
