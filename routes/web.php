<?php
 

use Illuminate\Http\Request;
use App\Http\Controllers\taskController;



 
/**
 * Display All Tasks
 */

 
/**
 * Add A New Task
 */

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    //
});



 Route::POST("addtask",[taskController::class,'addtask']);
 Route::get ("/",[taskController::class,'fatchtask']);
 Route::get("delete/{id}",[taskController::class,'delete']);