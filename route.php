<?php

use Core\Route;
use Core\Service\Auth;


Route::get('/', 'HomeController@index');

// authentication
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@authLogin');
Route::get('logout', 'AuthController@logout');

Route::get('admin', 'AdminController@index');