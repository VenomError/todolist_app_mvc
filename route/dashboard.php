<?php

use Core\Route;

Route::get('dashboard', 'DashboardController@index');

Route::get('dashboard/task/list', 'TaskController@index');
Route::get('dashboard/task/create', 'TaskController@create');