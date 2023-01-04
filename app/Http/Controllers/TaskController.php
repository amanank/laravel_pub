<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', compact('tasks'));
    }

    public function taskStore(Request $req)
    {
        // $time = Carbon::parse($req->date)->format('H');
        // $request['time'] = $time;

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'date' => 'after_or_equal:11:00:00|before_or_equal:16:00:00'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $task = new Task();
            $task->name = $req->name;
            $task->date = $req->date;
            $task->save();
            return redirect()->back();
        }
    }

    public function taskDelete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
}
