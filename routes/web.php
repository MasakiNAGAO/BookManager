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
Route::get('book/interesting', 'BookController@interesting')->name('book.interesting');
Route::get('book/bought', 'BookController@bought')->name('book.bought');
Route::get('book/reading', 'BookController@reading')->name('book.reading');
Route::get('book/read', 'BookController@read')->name('book.read');
Route::resource('tags', 'TagController');

Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');