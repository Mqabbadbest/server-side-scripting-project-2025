<?php

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
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
/** The HomePage */
Route::get('/', function () {
    return view('welcome');
})->name('home');

// STUDENT ROUTES

//This route will display the list of students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
//This route will display the form to create a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
//This route will store the new student in the database
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
//This route will display the form to edit a student
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
//This route will update the student in the database
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
//This route will delete the student from the database
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
//This route will display a specific student's details
Route::get('/students/{id}/view', [StudentController::class, 'view'])->name('students.view');

// COLLEGE ROUTES

//This route will display the list of colleges
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
//This route will display the form to create a new college
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');
//This route will store the new college in the database
Route::post('/colleges/store', [CollegeController::class, 'store'])->name('colleges.store');
//This route will display the form to edit a college
Route::get('/colleges/{id}/edit',[CollegeController::class, 'edit'])->name('colleges.edit'); 
//This route will update the college in the database
Route::put('/colleges/{id}',[CollegeController::class, 'update'])->name('colleges.update');
//This route will delete the college from the database
Route::delete('/colleges/{id}',[CollegeController::class, 'destroy'])->name('colleges.destroy');
//This route will display a specific college's details
Route::get('/colleges/{id}/view',[CollegeController::class, 'view'])->name('colleges.view');