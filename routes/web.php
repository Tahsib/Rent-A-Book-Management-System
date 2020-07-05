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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books','BookController@index');

Route::middleware('auth')->group(function(){
    Route::get('/books/create','BookController@create');
    Route::post('/books','BookController@store');

    Route::get('/home','HomeController@index');

    Route::post('/rent/{book}/apply','RentController@store');

    Route::get('profile/{user}','ProfileController@show');
    Route::get('profile/{user}/edit','ProfileController@edit');
    Route::patch('/profile/{user}','ProfileController@update');
});

Auth::routes();


