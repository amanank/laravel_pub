@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->

 
    <div class="panel-body border">
        <!-- Display Validation Errors -->
        @include('common')


        <!----------------Alert------------------>
        @if(Session::has('create'))
        <div class="alert alert-success">{{Session::get('create')}}</div>
        @endif

        @if(Session::has('delete'))
        <div class="alert alert-danger">{{Session::get('delete')}}</div>
        @endif

        <!----------------End Alert----------------------->
 
        <!-- New Task Form -->
        <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
            @csrf
 
            <!-- Task Name -->
            <div class="panel-heading p-3 mb-2 bg-light text-dark ">
                Tasks
            </div>
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label ">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
<!-----------------------------Date------------------------>
            <div class="form-group date" data-provide="datepicker">
                <label for="task" class="col-sm-3 control-label ">Date</label>
                <div class="col-sm-6">
                    <input type="date" name="date" class="form-control" data-date-format="mm/dd/yyyy">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                </div> 
            </div>

            <!--------------------Time---------------------------->

            <div class="form-group date" time-provide="timepicker">
                <label for="task" class="col-sm-3 control-label ">Time</label>
                    <div class="col-sm-6">
                        <input type = 'time' name="time" class="form-control" />  
                        <span class = "input-group-addon">  
                        <span class = "glyphicon glyphicon-time"></span>  
                        </span>  
                    </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>


    @if (count($tasks) > 0)
    <div class="panel panel-default pt-4">
        <div class="panel-heading p-3  border bg-light text-dark font-weight-bold">
            Current Tasks
        </div>

        <div class="panel-body border">
            <table class="table table-striped task-table table-bordered">

                <!-- Table Headings -->
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>
                                    {{$task->id}}
                                </div>

                            </td>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->date }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->time }}</div>
                            </td>

                            <td>
                                <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i>
                                        Delete Task
                                    </button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                

            </table>
        </div>
    </div>
@endif
    <!-- TODO: Current Tasks -->
@endsection