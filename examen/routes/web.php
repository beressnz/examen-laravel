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

Route::get('empleado','EmpleadoController@index')->name('empleado.index');
Route::get('empleado/create','EmpleadoController@create')->name('empleado.create');
Route::post('empleado','EmpleadoController@store')->name('empleado.store');

Route::get('empleado/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit');

Route::put('empleado/{empleado}','EmpleadoController@update')->name('empleado.update');
Route::get('empleado/{empleado}','EmpleadoController@show')->name('empleado.show');

Route::delete('empleado/{empleado}','EmpleadoController@destroy')->name('empleado.destroy');

Route::get('activar/empleado/{empleado}','EmpleadoController@activar')->name('empleado.activar');

Route::get('moneda/empleado/{empleado}','EmpleadoController@moneda')->name('empleado.moneda');