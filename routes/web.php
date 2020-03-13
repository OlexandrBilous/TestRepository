<?php

use App\Models\Bank;
use Illuminate\Http\Request;
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

//Route::get('/', 'BankController@show')->name('index');
Route::post('/saveTarif', [
    'as'=>'saveTarif',
    'uses'=>'BankController@saveTarif'
]);
Route::post('/saveBank', [
    'as'=>'saveBank',
    'uses'=>'BankController@saveBank'
]);

Route::post('/saveCredit_type', [
    'as'=>'saveCredit_type',
    'uses'=>'BankController@saveCredit_type'
]);

Route::get('/addTarif', [
    'as'=>'addTarif',
    'uses'=>'BankController@addTarif'
]);
Route::get('/addBank', [
    'as'=>'addBank',
    'uses'=>'BankController@addBank'
]);
Route::get('/addCredit_type', [
    'as'=>'addCredit_type',
    'uses'=>'BankController@addCredit_type'
]);
Route::get('/' , [
    'as' => 'showTarif',
    'uses'=>'BankController@showTarif'
]);


Route::get('/filterTraif', 'BankController@filtrationOfTarif')->name('filterTraif');

