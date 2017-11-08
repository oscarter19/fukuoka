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
    return view('auth/login');
});
Route::get('producto/prueba', 'ProductoController@prueba');
Route::resource('producto','ProductoController');
Route::resource('entDetalle','EntDetailsController');
Route::resource('entrada','EntriesController');
Route::resource('proveedor','ProviderController');
Route::resource('inventario','InventoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

