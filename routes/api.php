<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
Route::group(['prefix' => 'client'], function () {
    Route::get('/', 'ClientController@index');
    Route::post('store', 'ClientController@store');
    Route::get('show', 'ClientController@show');
    Route::post('update', 'ClientController@update');
    Route::post('destroy', 'ClientController@destroy');
});
Route::group(['prefix' => 'os'], function () {
    Route::get('/', 'OrderServiceController@index');
    Route::post('store', 'OrderServiceController@store');
    Route::post('upload', 'OrderServiceController@upload');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    $hw = ['auth'=>'api autenticacion de los usuarios','client'=>'api clientes','os'=>'api ordenes de servicio'];
    return $hw;
});
