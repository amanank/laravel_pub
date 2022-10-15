<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task2Controller;





 Route::POST("adddata",[Task2Controller::class,'addData']);
 Route::get ("/",[Task2Controller::class,'fatchData']);