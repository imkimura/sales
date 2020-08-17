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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/new-sale', 'HomeController@store')->name('new.sale');
Route::get('/report/{id}', 'HomeController@report')->name('report.sale');

Route::resource('seller', 'SellerController')->except(['store', 'update', 'destroy', 'edit']);
