<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'date' => 'date'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            
        }
    }
}
