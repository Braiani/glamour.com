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

Route::get('/', 'PublicController@index')->name('home');

Route::get('/sobre-nos', 'PublicController@showAbout')->name('about');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/pesquisa', 'PublicController@showSearch')->name('search');
Route::get('/categoria/{category}', 'PublicController@showCategory')->name('category');
Route::get('/autor/{autor}', 'PublicController@showAutor')->name('autor');
Route::get('/{post}', 'PublicController@show')->name('post');
Route::post('/{post}', 'CommentController@store')->name('comment');
