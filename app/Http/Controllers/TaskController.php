<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class TaskController extends Controller {
    public function index() {
        return view('tasks', [
            'tasks' => Task::search()
        ]);
    }

    public function delete($id) {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }

    public function  update(Request $request) {
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required|max:20|min:2',
            'date' =>
            'required|date|unique:tasks,date',
            'time' => 'required|',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        Task::store($request);
        return redirect('/');
    }
}
