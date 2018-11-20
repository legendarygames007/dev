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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addlevel', 'AddlevelController@index')->name('addlevel');
Route::get('/admin/home', 'admin\AdminController@index')->name('admin.home');
//Route::get('/admin/layouts/englishcrossword', 'admin\AdminController@index')->name('admin.layouts.englishcrossword');
Route::get('/admin/english/englishcrossword/', 'admin\EnglishCrosswordController@index')->name('englishcrossword.show');
Route::get('/admin/english/englishcrossword/create', 'admin\EnglishCrosswordController@create')->name('englishcrossword.create');
Route::post('/admin/english/englishcrossword/store', 'admin\EnglishCrosswordController@store')->name('englishcrossword.store');

Route::get('/admin/env/', 'admin\EnvController@index')->name('env.show');
Route::post('/admin/env/', 'admin\EnvController@update')->name('env.update');
