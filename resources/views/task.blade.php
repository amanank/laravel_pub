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
                          <label for="task" class="form-label">Task</label>
                          <input type="text" class="form-control" id="task" aria-describedby="emailHelp" name="name" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                          <label for="dueDate" class="form-label">Due Date</label>
                          <input type="date" class="form-control" id="dueDate" aria-describedby="emailHelp" name="due_date" value="{{old('due_date')}}">
                        </div>
                        <div class="mb-3">
                          <label for="dueTime" class="form-label">Due Time</label>
                          <input type="time" class="form-control" id="dueTime" aria-describedby="emailHelp" name="due_time" value="{{old('due_time')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">+ Add Task</button>
                      </form>
                </div>
              </div>
        </div>
    </div>
    <div class="contaier">
     
    </div>
     
    @if ($tasks->count()>0)
    <div class="row d-flex justify-content-center mt-5">
       
        <div class="col-sm-8">
            <div class="card ">
                <h5 class="card-header">Current Tasks</h5>
                <div class="card-body">
                  <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Due Date</th>
                            <th>Due Time</th>
                            <th>Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Item 1</td>
                            <td>Item 2</td>
                            <td>Item 3</td>
                            <td>Item 4</td>
                            <td>Item 5</td>
                        </tr>
                        <tr>
                          <td>Item 6</td>
                          <td>Item 7</td>
                          <td>Item 8</td>
                          <td>Item 9</td>
                          <td>Item 10</td>
                        </tr>
                    </tbody>
                </table>
                  
                  {{-- <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <form style="display: inline !important;" action="{{route('task.delete.all')}}" method="POST">
                          @csrf
                          <input type="hidden" name="task_id" value="">
                          <div style="display: inline !important;">
                            <button type="submit" class="btn btn-primary float-end">Delete All</button>
                          </div>
                        </form>
                      </li>
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
                      </ul> --}}
                </div>
              </div>
        </div>
    </div>
    @endif
@endsection

@section('pageScripts')
    <script>
      $(document).ready( function () {
        $('#table_id').DataTable();
      } );
    </script>
@endsection