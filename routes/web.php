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
Route::post('/problems/update','ProblemController@update' )->middleware('auth');

Route::post('/stock/update','StockController@update' )->middleware('auth');


Route::post('/stock/groupdelete','StockController@batchlisteditfilter' )->middleware('auth');

Route::post('/stock/filter','StockController@filter' )->middleware('auth');
Route::post('/stock/filtergroup','StockController@filtergroup' )->middleware('auth');
Route::post('/stock/relocategroup','StockController@relocategroup' )->middleware('auth');


Route::post('/stock/batchdelete','StockController@batchdelete' )->middleware('auth');


Route::get('/stock/noqr','StockController@noqr' )->middleware('auth');

Route::get('/stock/{id}/return','StockController@return' )->middleware('auth');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/stock/{id}/destroy', 'StockController@destroy')->middleware('auth');;

Auth::routes();
Route::get('/stock/returnlog', 'StockController@returnLog')->middleware('auth');

Route::get('/stock/log', 'StockController@log')->middleware('auth');
Route::get('/products/batch', 'ProductController@batch')->middleware('auth');

Route::post('/','StockController@index' )->middleware('auth');
Route::post('/stock/savemove','StockController@savemove' )->middleware('auth');
Route::post('/stock/savereturn','StockController@savereturn' )->middleware('auth');
Route::post('/banks/restore','BankController@restore' )->middleware('auth');

Route::post('/departments/restore','DepartmentController@restore' )->middleware('auth');
Route::post('/rooms/restore','RoomController@restore' )->middleware('auth');

Route::post('/banks/restore','BankController@restore' )->middleware('auth');

Route::get('/stock/{id}/edit', 'StockController@edit')->middleware('auth');;



Route::post('/stock/move','StockController@request' )->middleware('auth');
Route::get('/stock/requested', 'StockController@requested')->middleware('auth');
Route::get('/stock/batchlistedit', 'StockController@batchlistedit')->middleware('auth');
Route::get('/stock/deletelist', 'StockController@deletelog')->middleware('auth');

Route::get('/stock/batchlist', 'StockController@batchlist')->middleware('auth');
Route::get('/stock/productlist', 'StockController@productlist')->middleware('auth');
Route::get('/stock/productlistDis', 'StockController@productlistDis')->middleware('auth');

Route::get('/stock/batchmove', 'StockController@batchmove')->middleware('auth');

Route::get('/stock/move', 'StockController@move')->middleware('auth');

Route::get('/stock/{id}/serial', 'StockController@serial')->middleware('auth');

Route::get('/stock/{id}/id', 'StockController@id')->middleware('auth');


Route::get('/stock/{id}/product', 'StockController@product')->middleware('auth');

Route::get('/employees/{id}/deactivate', 'EmployeeController@deactivate')->middleware('auth');
Route::get('/employees/{id}/activate', 'EmployeeController@activate')->middleware('auth');;
Route::get('/warehouses/{id}/edit', 'WarehouseController@edit')->middleware('auth');;
Route::get('/warehouses/{id}/deactivate', 'WarehouseController@deactivate')->middleware('auth');;
Route::get('/warehouses/{id}/activate', 'WarehouseController@activate')->middleware('auth');;

Route::get('/branches/{id}/deactivate', 'BranchController@deactivate')->middleware('auth');;
Route::get('/branches/{id}/activate', 'BranchController@activate')->middleware('auth');;

Route::get('/products/{id}/deactivate', 'ProductController@deactivate')->middleware('auth');;
Route::get('/products/{id}/activate', 'ProductController@activate')->middleware('auth');;

Route::get('/users/{id}/enable', 'UserController@enable')->middleware('auth');;
Route::get('/users/{id}/disable', 'UserController@disable')->middleware('auth');;

Route::resource('rooms','RoomController')->middleware('auth');;
Route::resource('banks','BankController')->middleware('auth');;
Route::resource('devices','DeviceController')->middleware('auth');;

Route::resource('departments','DepartmentController')->middleware('auth');;

Route::resource('stock','StockController')->middleware('auth');;
Route::resource('dcontracts','DevicecontractsController')->middleware('auth');;
Route::get('/dcontracts/{id}/create', 'DevicecontractsController@create')->middleware('auth');

Route::resource('products','ProductController')->middleware('auth');;
Route::resource('branches','BranchController')->middleware('auth');;
Route::resource('warehouses','WarehouseController')->middleware('auth');;

Route::get('/employees/batch', 'EmployeeController@batch')->name('employeebatch')->middleware('auth');;
Route::resource('units','UnitController')->middleware('auth');;
Route::get('/vendors/{id}/deactivate', 'VendorController@deactivate')->middleware('auth');;
Route::get('/vendors/{id}/show', 'VendorController@show')->middleware('auth');;

Route::get('/vendors/{id}/activate', 'VendorController@activate')->middleware('auth');;

Route::get('/nationalities/batch', 'NationalityController@batch')->name('nationalitybatch')->middleware('auth');;
Route::get('/types/batch', 'TypeeController@batch')->name('typebatch')->middleware('auth');;
Route::resource('types','TypeController')->middleware('auth');;
Route::resource('nationalities','NationalityController')->middleware('auth');;
Route::resource('employees','EmployeeController')->middleware('auth');;
Route::resource('companies','CompanyController')->middleware('auth');;
Route::resource('vendors','VendorController')->middleware('auth');;
Route::resource('problems','ProblemController')->middleware('auth');
Route::resource('requests', 'RequestController')->middleware('auth');
Route::resource('users', 'UserController')->middleware('auth');
Route::resource('roles','RoleController')->middleware('auth');
Route::resource('stockroles','StockroleController')->middleware('auth');

Route::get('/lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang'])->middleware('auth');;

Route::get('/', function () {
    return redirect('/stock');
})->middleware('auth');;


Route::get('/title/batch', 'TitleController@batch')->name('titlebatch')->middleware('auth');;


Route::resource('employee','EmployeeController')->middleware('auth');;
Route::resource('title','TitleController')->middleware('auth');;

Route::get('/home', 'StockController@index')->name('home')->middleware('auth');;
