<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','HomeController@index')->name('admin.dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('all-product', 'Buyer\ProductController@view')->name('product.all');
Route::resource('product', 'Buyer\ProductController');
Route::get('Procurement-view', 'Buyer\ProcurementrequestController@view')->name('procurement.all');
Route::get('procurement/product/{val}', 'Buyer\ProcurementrequestController@getProduct');
Route::get('procurements/all', 'Buyer\ProcurementrequestController@procurements')->name('procurements.show');

Route::get('procurements/send/{id}', 'Buyer\ProcurementrequestController@sendReq')->name('send.req');
Route::get('procurements/bid', 'Buyer\ProcurementrequestController@getBid')->name('procurements.bid');

Route::get('procurement/accept/{id}', 'Buyer\ProcurementrequestController@accept')->name('procurement.accept');
Route::resource('procurement', 'Buyer\ProcurementrequestController');


Route::post('bid', 'Supplier\SupplierController@bid')->name('supplier.bid');
Route::resource('supplier', 'Supplier\SupplierController');
