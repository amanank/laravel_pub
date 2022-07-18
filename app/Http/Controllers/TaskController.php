<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Rules\TaskUniqueDateTime;

class TaskController extends Controller
{
    public function home()
    {
        $tasks = Task::getAll();
 
        return view('task', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //Validation Rules  
            'name' => ['required','max:255'],
            'due_date' => ['required','max:255'],
            'due_time' => ['required','max:255',new TaskUniqueDateTime($request->due_date)],
        ],[
            //Validation Messages
            'required'=>':attribute Required',
        ],[
            //Validation Attributes
            'name' =>'Task Name',
            'due_date' =>'Due Date',
            'due_time' =>'Due Time',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'due_date' => $request->due_date,
            'due_time' => $request->due_time,
        ]);

        return back()->with('success', 'Task with id '.$task->id.' Created Successfully');
    }

    public function deleteTask(Request $request)
    {
        Task::deleteSingle($request->task_id);

        return back()->with('success', 'Task with id '.$task->id.' Deleted Successfully');
    }

    public function deleteAllTask()
    {
        Task::emptyList();

        return back()->with('success', 'All Tasks Deleted Successfully');
    }
}
