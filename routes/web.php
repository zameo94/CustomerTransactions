<?php

use Illuminate\Support\Facades\Route;

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

Route::get('index-currencies', 'CurrencyWebServerController@index')->name('index-currencies.index');
Route::get('index-currencies/{indexCurrency}/', 'CurrencyWebServerController@show')->name('index-currencies.show');

Route::get('customers', 'CustomerController@index')->name('customers.index');
Route::get('customers/{customer}/', 'CustomerController@show')->name('customers.show');

Route::get('customers-transactions', 'CustomerTransactionController@index')->name('customers-transactions.index');
Route::get('customers-transactions/{customerTransaction}/', 'CustomerTransactionController@show')->name('customers-transactions.show');
