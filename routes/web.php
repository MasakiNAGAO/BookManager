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
Route::get('home', 'WebController@index');

Route::get('books', 'BookController@index')->name('books.index')->middleware('auth');
Route::get('books/{book}', 'BookController@show')->name('books.show')->middleware('auth');
Route::get('book/interesting', 'BookController@interesting')->name('book.interesting')->middleware('auth');
Route::get('book/bought', 'BookController@bought')->name('book.bought')->middleware('auth');
Route::get('book/reading', 'BookController@reading')->name('book.reading')->middleware('auth');
Route::get('book/read', 'BookController@read')->name('book.read')->middleware('auth');
Route::resource('tags', 'TagController')->middleware('auth');
Route::post('/result', 'SearchController@result')->middleware('auth');

Auth::routes();