<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Dotenv\Validator;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    public function delete(){
        function ($id) {
            Task::findOrFail($id)->delete();

            return redirect('/');
        };
    }
    public function  validat(Request $request) {

         
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            }
            $task = new Task;
            $task->name = $request->name;
            $task->save();

            return redirect('/');
        }
    }

