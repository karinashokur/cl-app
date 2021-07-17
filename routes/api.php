<?php
use Illuminate\Http\Request;
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('auth/user', 'AuthController@user')->middleware('auth:api');
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('user', 'UserController')->except('create', 'store');
    Route::resource('task', 'TaskController')->except('create');
    Route::resource('risk', 'RiskController')->except('create');
    Route::resource('tariff', 'TariffController')->except('create');
    Route::resource('customer', 'CustomerController')->except('create');
    Route::post('undertask/{task}', 'UnderTaskController@store')->name('undertask.store');
    Route::delete('undertask/{task}', 'UnderTaskController@destroy')->name('undertask.destroy');
});
