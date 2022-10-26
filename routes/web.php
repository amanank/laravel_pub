<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Task;

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

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
 
    return view('task', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function (Request $req) {
    $validator = Validator::make($req->all(), [
        'name' => 'required | min:5 | max:20',
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
})->name('store');

Route::get('/view', function () {

    $tasks = Task::all(); 
    return view('tasks', compact('tasks'));
 
    // Create The Task...
});

Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();
 
    return redirect('/view');
})->name('delete');