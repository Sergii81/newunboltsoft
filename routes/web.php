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
    return view('welcome');
});

Route::get('/read', 'TranslationController@read')->name('read');
Route::post('/create', 'TranslationController@create')->name('create');
Route::post('/destroy', 'TranslationController@destroy')->name('destroy');
Route::get('/test', 'TranslationController@getWorld')->name('getWorld');
