<?php

use Illuminate\Support\Facades\Route;

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


Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate')->name('login');
Route::get('logout', 'UserController@logout')->name('logout');

Route::get('users', 'UserController@index');
Route::get('users/all', 'UserController@all')->middleware('jwt.verify');
Route::get('users/{id}', 'UserController@getById');
Route::post('users/name', 'UserController@getByName');
Route::get('users/delete/{id}', 'UserController@destroy');
Route::post('users/update/{id}', 'UserController@update');

Route::get('clients', 'ClientController@index')->name('clients');
Route::get('clients/all', 'ClientController@all');
Route::post('clients/create', 'ClientController@store');
Route::get('clients/{id}', 'ClientController@getById');
Route::get('clients/delete/{id}', 'ClientController@destroy');
Route::post('clients/update/{id}', 'ClientController@update');
