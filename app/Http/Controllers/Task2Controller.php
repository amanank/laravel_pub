<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tasktwo;


class Task2Controller extends Controller
{
    
 function addData(Request $req){
        
      $tasktwo=new tasktwo;    
      $tasktwo->date=$req->date;
      $tasktwo->time=$req->time;
      $tasktwo->datepicker=$req->datepicker;
      $tasktwo->save();
      return redirect('/');

     }

 function fatchData(){
        $item = tasktwo::orderBy('id', 'desc')->take(5)->paginate(10);
        return view('/index',['tasktwo'=>$item]);
  }


}
