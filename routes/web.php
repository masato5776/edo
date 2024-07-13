<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/book-add','App\Http\Controllers\BookAddController@index')->name('book-add.index');

Route::post('/book-add', 'App\Http\Controllers\BookAddController@store')->name('book-add.store');

Route::get('/','App\Http\Controllers\BookListController@index')->name('book-list.index');
