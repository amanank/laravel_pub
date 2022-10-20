<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Task;

use Illuminate\Http\Request;
use App\Models\Task;
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

<<<<<<< Updated upstream
Route::get('/', [TaskController::class, 'create']);

Route::post('/task', [TaskController::class, 'store'])->name('store');

Route::get('/view', [TaskController::class, 'index']);

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('delete');
=======
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
 
    return view('task', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function (Request $req) {
    $validator = Validator::make($req->all(), [
        'name' => 'required|max:255',
    ]);
 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $req->name;
    $task->save();
 
    return redirect('/');
 
    // Create The Task...
});

Route::get('/view', function () {

    $tasks = Task::all(); 
    return view('tasks', compact('tasks'));
 
    // Create The Task...
});

Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();
 
    return redirect('/view');
});
>>>>>>> Stashed changes
