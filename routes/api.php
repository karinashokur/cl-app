<?php
use Illuminate\Http\Request;
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('auth/user', 'AuthController@user')->middleware('auth:api');
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('user', 'UserController')->except('create', 'store');
    Route::resource('task', 'TaskController')->except('create', 'store');
});
