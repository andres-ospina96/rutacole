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


Route::get('child', 'ChildController@index')->name('child.index');
Route::get('child/new', 'ChildController@create')->name('child.new');
Route::get('child/edit/{id}', 'ChildController@edit')->name('child.edit');
Route::post('child/store', 'ChildController@store')->name('child.store');
Route::post('child/update', 'ChildController@update')->name('child.update');
Route::get('child/destroy/{id}', 'ChildController@destroy')->name('child.destroy');
Route::get('/home', 'HomeController@index')->name('home');