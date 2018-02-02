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
    return view('auth/login');
});


Route::resource('inventario/usuario','UsuarioController');
Route::resource('inventario/producto','ProductoController');
Route::resource('inventario/bodeguero','BodegueroController');
Route::resource('inventario/ajuste','AjusteController');


Route::get('inventario/admin','FrontController@admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
