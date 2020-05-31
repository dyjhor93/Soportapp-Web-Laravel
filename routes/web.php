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

Route::get('/', function(){
	return view('welcome');
});

Route::get('/download', function(){
	return view('download');
});

Route::get('/listar', 'OrderServiceController@listar');

Route::get('/search', function(){
	return view('search');
});

Route::get('/evidencias', function(){
	return view('evidencias');
});
Route::get('/search/{nic}-{os}','OrderServiceController@viewer');
Route::post('search', 'OrderServiceController@search');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
