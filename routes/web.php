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



//-------customer---------//
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


//-------unit---------//
Route::prefix('unit')->group(function()
{
	Route::get('/view','Backend\UnitController@view')->name('unit.view');
	Route::get('/add','Backend\UnitController@add')->name('unit.add');
	Route::post('/store','Backend\UnitController@store')->name('unit.store');
	Route::get('/edit/{id}','Backend\UnitController@edit')->name('unit.edit');
	Route::post('/update/{id}','Backend\UnitController@update')->name('unit.update');
	Route::get('/delete/{id}','Backend\UnitController@delete')->name('unit.delete');
	Route::get('/active/{id}','Backend\UnitController@active')->name('unit.active');
	Route::get('/inactive/{id}','Backend\UnitController@inactive')->name('unit.inactive');
});


//-------category---------//
Route::prefix('category')->group(function()
{
	Route::get('/view','Backend\CategoryController@view')->name('category.view');
	Route::get('/add','Backend\CategoryController@add')->name('category.add');
	Route::post('/store','Backend\CategoryController@store')->name('category.store');
	Route::get('/edit/{id}','Backend\CategoryController@edit')->name('category.edit');
	Route::post('/update/{id}','Backend\CategoryController@update')->name('category.update');
	Route::get('/delete/{id}','Backend\CategoryController@delete')->name('category.delete');
	Route::get('/active/{id}','Backend\CategoryController@active')->name('category.active');
	Route::get('/inactive/{id}','Backend\CategoryController@inactive')->name('category.inactive');
});


//-------category---------//
Route::prefix('product')->group(function()
{
	Route::get('/view','Backend\ProductController@view')->name('product.view');
	Route::get('/add','Backend\ProductController@add')->name('product.add');
	Route::post('/store','Backend\ProductController@store')->name('product.store');
	Route::get('/edit/{id}','Backend\ProductController@edit')->name('product.edit');
	Route::post('/update/{id}','Backend\ProductController@update')->name('product.update');
	Route::get('/delete/{id}','Backend\ProductController@delete')->name('product.delete');
	Route::get('/active/{id}','Backend\ProductController@active')->name('product.active');
	Route::get('/inactive/{id}','Backend\ProductController@inactive')->name('product.inactive');
});



//-------purchase---------//
Route::prefix('purchase')->group(function()
{
	Route::get('/view','Backend\PurchaseController@view')->name('purchase.view');
	Route::get('/add','Backend\PurchaseController@add')->name('purchase.add');
	Route::post('/store','Backend\PurchaseController@store')->name('purchase.store');
	Route::get('/delete/{id}','Backend\PurchaseController@delete')->name('purchase.delete');
	Route::get('/purchase.padding/list','Backend\PurchaseController@purchaselist')->name('purchase.padding.list');
	Route::get('/aprove/{id}','Backend\PurchaseController@aprove')->name('purchase.aprove');
});


//-------invoices---------//
Route::prefix('purchase')->group(function()
{
	Route::get('/invoices','Backend\PurchaseController@invoiceview')->name('invoices.view');
	Route::get('/approval','Backend\PurchaseController@approvalview')->name('approval.add');

});


//-------purchase---------//
Route::prefix('invoices')->group(function()
{
	Route::get('/view','Backend\InvoicesController@view')->name('invoices.view');
	Route::get('/add','Backend\InvoicesController@add')->name('invoices.add');
	Route::post('/store','Backend\InvoicesController@store')->name('invoices.store');
	Route::get('/delete/{id}','Backend\InvoicesController@delete')->name('invoices.delete');
	Route::get('/purchase/padding/list','Backend\InvoicesController@invoicelist')->name('invoices.padding.list');
	Route::get('/aprove/{id}','Backend\InvoicesController@aprove')->name('invoices.aprove');
});


Route::get('/get_category','Backend\DefultController@getcategory')->name('get_category');
Route::get('/get_product','Backend\DefultController@getproduct')->name('get_product');
Route::get('/chack-product-stock','Backend\DefultController@getstock')->name('chack-product-stock');



});





