<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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


/**
 * Display All Tasks
 */
Route::get('/', [TaskController::class, 'index']);

Route::delete('/task/{id}',[TaskController::class,'delete'] );

Route::post('/task', [TaskController::class,'validat'])->name('validat');
