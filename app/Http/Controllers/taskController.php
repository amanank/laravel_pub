<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\tasks;
class taskController extends Controller
{
    
 function addtask(Request $req){
        
      $tasks=new tasks;
      
      $tasks->name=$req->name;
    
     
      $tasks->save();

      return redirect('/');
     }

 function fatchtask(){
        $item = tasks::orderBy('id', 'desc')->take(5)->paginate(10);
        return view('/tasks',['tasks'=>$item]);
  }

  function delete($id){
        $data=tasks::find($id);
        $data->delete();
        return redirect('/');   
    }




}
