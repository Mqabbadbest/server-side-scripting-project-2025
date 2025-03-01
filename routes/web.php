<?php

use App\Http\Controllers\CollegeController;
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

Route::get('/students/edit', function () {
    return view('students/edit');
});

Route::get('/students/view', function () {
    return view('students/view');
});

Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');
Route::post('/colleges/store', [CollegeController::class, 'store'])->name('colleges.store');
Route::get('/colleges/{id}/edit',[CollegeController::class, 'edit'])->name('colleges.edit'); 
Route::put('/colleges/{id}',[CollegeController::class, 'update'])->name('colleges.update');
Route::delete('/colleges/{id}',[CollegeController::class, 'destroy'])->name('colleges.destroy');
Route::get('/colleges/{id}/view',[CollegeController::class, 'view'])->name('colleges.view');

// Route::get('/colleges/view', function () {
//     return view('colleges/view');
// });

