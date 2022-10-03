@extends('layouts.app')
 
@section('content')

        
@include('common.errors')
@include('common.success')
    <div class="row d-flex justify-content-center mt-5">
       
        <div class="col-sm-6">
            <div class="card ">
                <h5 class="card-header">New Task</h5>
                <div class="card-body">
                    <form action="{{route('task.store')}}" method="POST" class="row g-3">
                        @csrf
                        <div class="mb-3">
                          <label for="task" class="form-label">Task</label>
                          <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : (old('name')? 'is-valid' : '')}}" id="task" name="name" value="{{old('name')}}" required>
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="dueDate" class="form-label">Due Date</label>
                            <input type="date" class="form-control {{$errors->has('due_date')? 'is-invalid' : (old('due_date')? 'is-valid' : '')}}" id="dueDate" name="due_date" value="{{old('due_date')}}" required>
                            @error('due_date')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="dueTime" class="form-label">Due Time</label>
                            <input type="time" class="form-control {{$errors->has('due_time')? 'is-invalid' : (old('due_time')? 'is-valid' : '')}}" id="dueTime" name="due_time" value="{{old('due_time')}}" required>
                            @error('due_time')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
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
                      @foreach ($tasks as $task)
                      <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->name}}</td>
                        <td>{{$task->due_date}}</td>
                        <td>{{$task->due_time}}</td>
                        <td>{{$task->created_at}}</td>
                    </tr>  
                      @endforeach
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