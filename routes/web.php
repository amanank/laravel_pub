<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);
Route::delete('/task/{id}', [TaskController::class, 'delete']);
Route::post('/task', [TaskController::class, 'validat'])->name('validat');
