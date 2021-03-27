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
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('vehiclecategories', 'VehiclecategoryController');

Route::resource('wreckers', 'WreckerController');

Route::resource('criterias', 'CriteriaController');

Route::resource('clients', 'ClientController');

Route::resource('transactions', 'TransactionController');

Route::resource('logs', 'LogController');

Route::resource('complaints', 'ComplaintController');

Route::resource('peopletypes', 'PeopletypeController');

Route::resource('pricegettings', 'PricegettingController');

Route::resource('pricepenalities', 'PricepenalityController');

Route::resource('repairs', 'RepairController');

Route::get('repairs/{id}/invoice', [
  'as'=>'repairs.print',
  'uses'=>'RepairController@printDetail'
]);

Route::get('repairs/{id}/payment', [
  'as'=>'repairs.payment',
  'uses'=>'RepairController@getPayment'
]);
Route::post('repairs/{id}/payment', [
  'as'=>'repairs.payment',
  'uses'=>'RepairController@postPayment'
]);
Route::get('repairs/{id}/recu', [
  'as'=>'repairs.recu',
  'uses'=>'RepairController@recu'
]);