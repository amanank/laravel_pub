<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * Display All Tasks
 */
Route::get('/', [TaskController::class,'home']);

/**
 * Add A New Task
 */
Route::post('/task', [TaskController::class,'store'])->name('task.store');
 
/**
 * Delete An Existing Task
 */
Route::post('/delete-task',[TaskController::class,'deleteTask'])->name('task.delete');

/**
 * Delete All Existing Tasks
 */
Route::post('/delete-all-task',[TaskController::class,'deleteAllTask'])->name('task.delete.all');