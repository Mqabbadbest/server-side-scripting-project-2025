<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
    return view('students/index');
});

Route::get('/students/create', function () {
    return view('students/create');
});

Route::get('/colleges', function () {
    return view('colleges/index');
});

Route::get('/colleges/create', function () {
    return view('colleges/create');
});

