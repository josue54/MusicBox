<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('aviones', 'AvionController');
Route::post('aviones/{id}/update', 'AvionController@update');
Route::get('aviones/{id}/delete', 'AvionController@destroy');

Route::resource('pilotos', 'PilotoController');
Route::post('pilotos/{id}/update', 'PilotoController@update');
Route::get('pilotos/{id}/delete', 'PilotoController@destroy');

Route::resource('vuelos', 'VueloController');
Route::post('vuelos/{id}/update', 'VueloController@update');
Route::get('vuelos/{id}/delete', 'VueloController@destroy');

Route::get('/', 'AvionController@index');
