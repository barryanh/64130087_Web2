<?php

use App\Http\Controllers\admin_vemoni\HomeController;
use App\Http\Controllers\admin_vemoni\StudentController;
use App\Http\Controllers\admin_vemoni\TopicController;
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

// Dashboard Route
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Topic Route
Route::get('/topic/all', [TopicController::class, 'index'])->name('topics.index');
Route::get('/topic/new', [TopicController::class, 'create'])->name('topics.create');
Route::post('/topic', [TopicController::class, 'store'])->name('topics.store');
Route::get('/topic/view/{topic}', [TopicController::class, 'view'])->name('topics.view');
Route::get('/topic/edit/{topic}', [TopicController::class, 'edit'])->name('topics.edit');
Route::put('/topic/{topic}', [TopicController::class, 'update'])->name('topics.update');
Route::delete('/topic/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');


// Student Route
Route::get('/student/all', [StudentController::class, 'index'])->name('students.index');
Route::get('/student/new', [StudentController::class, 'create'])->name('students.create');
Route::post('/student', [StudentController::class, 'store'])->name('students.store');
Route::get('/student/view/{student}', [StudentController::class, 'view'])->name('students.view');
Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
