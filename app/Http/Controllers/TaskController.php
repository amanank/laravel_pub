<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
 
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
        ]);
     
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
     
        $task = new Task;
        $dataTime = explode(' ', $request->date);
       
        $date = $dataTime[1];
        $time = $dataTime[0];
        $data = Task::where('date', $date)->where('time',$time.$request->time)->first();
     
        if(isset($data->id))
        {
            return redirect('/')
            ->withInput()
            ->withErrors('Already Exist'); 
        }
        $task->name = $request->name;
        $task->date = $date;
        $task->time = $time.$request->time;
        $task->save();
     
        return redirect('/');

    }
    public function delete($id)
    {
        Task::findOrFail($id)->delete();
 
        return redirect('/');
    }
}
