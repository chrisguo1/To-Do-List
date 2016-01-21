<?php

//Home Controller
Route::get('/', 'HomeController@index');

//Items Controller

Route::resource('items', 'ItemsController');

//Restore Controller
Route::delete('restore', 'RestoreController@destroyAll');
Route::resource('restore', 'RestoreController');

//Tags Controller
Route::resource('tags', 'TagsController');

//Authorization and Password Controllers
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



