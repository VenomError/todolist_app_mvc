<?php

use Core\Route;

Route::get('error/{code}', 'ErrorController@error');