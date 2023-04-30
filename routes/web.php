<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function(){

//-------user---------//
Route::prefix('user')->group(function()
{
	Route::get('/view','Backend\UserController@view')->name('user.view');
	Route::get('/add','Backend\UserController@add')->name('user.add');
	Route::post('/store','Backend\UserController@store')->name('user.store');
	Route::get('/edit/{id}','Backend\UserController@edit')->name('user.edit');
	Route::post('/update/{id}','Backend\UserController@update')->name('user.update');
	Route::get('/delete/{id}','Backend\UserController@delete')->name('user.delete');
	Route::get('/active/{id}','Backend\UserController@active')->name('user.active');
	Route::get('/inactive/{id}','Backend\UserController@inactive')->name('user.inactive');
});


//-------user---------//
Route::prefix('profiles')->group(function()
{
	Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/update','Backend\ProfileController@update')->name('profiles.update');
	Route::get('/password/view','Backend\ProfileController@passwordview')->name('profiles.password.view');
	Route::post('/profiles/password/update','Backend\ProfileController@passwordupdate')->name('profiles.password.update');
});


//-------supplier---------//
Route::prefix('supplier')->group(function()
{
	Route::get('/view','Backend\SupplierController@view')->name('supplier.view');
	Route::get('/add','Backend\SupplierController@add')->name('supplier.add');
	Route::post('/store','Backend\SupplierController@store')->name('supplier.store');
	Route::get('/edit/{id}','Backend\SupplierController@edit')->name('supplier.edit');
	Route::post('/update/{id}','Backend\SupplierController@update')->name('supplier.update');
	Route::get('/delete/{id}','Backend\SupplierController@delete')->name('supplier.delete');
	Route::get('/active/{id}','Backend\SupplierController@active')->name('supplier.active');
	Route::get('/inactive/{id}','Backend\SupplierController@inactive')->name('supplier.inactive');
});



//-------supplier---------//
Route::prefix('customer')->group(function()
{
	Route::get('/view','Backend\CustomerController@view')->name('customer.view');
	Route::get('/add','Backend\CustomerController@add')->name('customer.add');
	Route::post('/store','Backend\CustomerController@store')->name('customer.store');
	Route::get('/edit/{id}','Backend\CustomerController@edit')->name('customer.edit');
	Route::post('/update/{id}','Backend\CustomerController@update')->name('customer.update');
	Route::get('/delete/{id}','Backend\CustomerController@delete')->name('customer.delete');
	Route::get('/active/{id}','Backend\CustomerController@active')->name('customer.active');
	Route::get('/inactive/{id}','Backend\CustomerController@inactive')->name('customer.inactive');
});



});





