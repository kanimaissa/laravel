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



Route::get('emis','EmController@index');

Route::get('emis/create','EmController@create');

Route::post('emis','EmController@store');

Route::get('emis/{id}/edit','EmController@edit');
Route::get('emis/{id}/show','EmController@show');


Route::put('emis/{id}','EmController@update');

Route::delete('emis/{id}','EmController@destroy');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
