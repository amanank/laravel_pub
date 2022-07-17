@extends('layouts.app')
 
@section('content')

        
@include('common.errors')
@include('common.success')
    <div class="row d-flex justify-content-center mt-5">
       
        <div class="col-sm-6">
            <div class="card ">
                <h5 class="card-header">New Task</h5>
                <div class="card-body">
                    <form action="{{route('task.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Task</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">+ Add Task</button>
                      </form>
                </div>
              </div>
        </div>
    </div>

    @if ($tasks->count()>0)
    <div class="row d-flex justify-content-center mt-5">
       
        <div class="col-sm-6">
            <div class="card ">
                <h5 class="card-header">Current Tasks</h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($tasks as $task)
                        <li class="list-group-item">{{$task->name}}
                            <form style="display: inline !important;" action="{{route('task.delete')}}" method="POST">
                                @csrf
                                <input type="hidden" name="task_id" value="{{$task->id}}">
                                <div style="display: inline !important;">
                                  <button type="submit" class="btn btn-primary float-end">Delete</button>
                                </div>
                              </form>      
                        </li>                  
                        @endforeach
                      </ul>
                </div>
              </div>
        </div>
    </div>
    @endif
   


    
    
   
 
    <!-- TODO: Current Tasks -->
@endsection