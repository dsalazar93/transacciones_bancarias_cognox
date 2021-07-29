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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('transactions', 'TransferController@index')->name('transactions');
Route::get('individual_accounts', 'TransferController@individual_accounts')->name('individual_accounts');
Route::get('third_accounts', 'TransferController@third_accounts')->name('third_accounts');
Route::post('send_transfer_myaccount', 'TransferController@send_transfer_myaccount')->name('send_transfer_myaccount');

