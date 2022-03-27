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

Route::get('/', 'WebController@index');

Route::get('books', 'BookController@index')->name('books.index');
Route::get('books/{book}', 'BookController@show')->name('books.show');
Route::get('books/interesting', 'BookController@interesting')->name('books.interesting');
Route::get('books/bought', 'BookController@bought')->name('books.bought');
Route::get('books/reading', 'BookController@reading')->name('books.reading');
Route::get('books/read', 'BookController@read')->name('books.read');
Route::resource('tags', 'TagController');
