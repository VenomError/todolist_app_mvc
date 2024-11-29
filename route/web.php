<?php

use Core\Route;
require dirname(__DIR__) . "/route/error.php";
require dirname(__DIR__) . "/route/dashboard.php";

Route::get('/', 'HomeController@index');
// authentication
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@authLogin');

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@authRegister');

Route::get('logout', 'AuthController@logout');

Route::get('admin', 'AdminController@index');