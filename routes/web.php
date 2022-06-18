<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


/**
 * Display All Tasks
 */
Route::resource('tasks', TaskController::class);