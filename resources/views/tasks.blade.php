@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 
    <div class="panel-body border">
        <!-- Display Validation Errors -->
        @include('common')
 
        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}
 
            <!-- Task Name -->
            <div class="panel-heading p-3 mb-2 bg-light text-dark ">
                Tasks
            </div>
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label ">Task</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
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
        <div class="panel-heading p-3  border bg-light text-dark">
            Current Tasks
        </div>

        <div class="panel-body border">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                <form action="/task/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger">Delete Task</button>
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