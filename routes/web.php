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
    return redirect('/clients');
});

Route::get('/clients', 'ClientController@index')->name('show');
Route::get('/parametrs', 'TestJobController@index');

Route::get('/clients/fetch_data', 'ClientController@fetch_data');
Route::post('/client', 'ClientController@save')->name('save');

Route::get('/client/edit/{id}', 'ClientController@edit')->name('edit');

Route::post('/client/update', 'ClientController@update')->name('update');

Route::get('/client/destroy/{id}', 'ClientController@destroy')->name('destroy');

Route::get('/login', 'AuthController@showLoginForm')->name('login');

Route::post('/login_process', 'AuthController@login')->name('login_process');

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/find', 'ClientController@find')->name('find');


