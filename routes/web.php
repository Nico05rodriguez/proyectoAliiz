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
    return view('vista');
});
route::resource('papelerias','PapeleriaController');
Route::get('papelerias.print','PapeleriaController@print');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin','AdminController');
Route::resource('/','VistaController');
