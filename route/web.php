<?php

use Core\Route;
require dirname(__DIR__) . "/route/error.php";

Route::get('/', 'HomeController@index');
// authentication
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@authLogin');
Route::get('logout', 'AuthController@logout');

Route::get('admin', 'AdminController@index');
Route::get('dashboard', 'DashboardController@index');