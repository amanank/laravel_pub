<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function home()
    {
        $tasks = Task::getTask();
 
        return view('task', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //Validation Rules  
            'name' => ['required','max:255'],
        ],[
            //Validation Messages
            'required'=>':attribute Required',
        ],[
            //Validation Attributes
            'name' =>'Task Name',
        ]);

        $task = Task::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Task Created Successfully');
    }

    public function deleteTask(Request $request)
    {
        Task::deleteSingleTask($request->task_id);

        return back()->with('success', 'Task Deleted Successfully');
    }

    public function deleteAllTask()
    {
        Task::emptyTaskList();

        return back()->with('success', 'All Tasks Deleted Successfully');
    }
}
