<?php
session_start();

require_once dirname(__DIR__) . "/vendor/autoload.php";
use Core\Route;

require_once dirname(__DIR__) . "/route/web.php";

// Jalankan dispatch untuk menangani rute
Route::dispatch();

flash()->clear();