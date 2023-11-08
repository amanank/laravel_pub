@extends('layouts.app')
@section('content')
<div class="container  mx-auto " style="width: 900px;  ">
    <div class="panel-body">
        <div class="panel-heading p-2" style="border: solid 1px; background-color:#b3a9a940 ">
            New Tasks
        </div>
        @include('common.errors')
        <form action="/task" method="POST" style="border: solid 1px" class="form-horizontal needs-validation" novalidate>
            {{ csrf_field() }}
            <div class="form-group row p-3">

                <div class="col-sm-4  has-validation  ">
                    <label for="task validation01 " class="col-sm-3 form-label">Task</label>
                    <input type="text" class="form-control" name="name" id="task-name  validation01" aria-describedby="inputgroupPrepend" value="{{ old('name') }}" required>
                    <div class="invalid-feedback alert">
                        Please choose a Task.
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="task validation01" class="col-sm-3 form-label">Date</label>
                    <input class="form-control" name="date" type="date" value="{{ old('date') }}">
                </div>
                <div class="col-sm-4">
                    <label for="task validation01" class="col-sm-3 form-label">Time</label><br>
                    <select class="form-control" name="time">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="task validation01" class="col-sm-3 form-label">new_Date</label>
                <input class="form-control" name="datetime" type="datetime" value="{{ old('date') }}">
            </div>
            <BR>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary m-4">
                        <i class="fa fa-plus"></i> Add Task
                    </button>

                </div>
            </div>
        </form>
    </div>
    @if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading p-2" style="border: solid 1px; background-color:#b3a9a940 ">
            Current Tasks
        </div>
        <div class="panel-body">
            <table style="border: solid 1px;" class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>Date </th>
                    <th>Time</th>
                    <th> </th>
                    <th>Delete the Task</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td>
                            <div>{{ $task->date }}</div>
                        </td>
                        <td>
                            <div>{{ $task->time }}</div>
                        </td>
                        <td>
                        <td>
                            <form action="/task/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button onclick="alert()" id="demo" class="btn btn-danger ">Delete Task
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    </td>
                    </tr>
                    <tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection
<script>
    function alert() {
        var txt;
        if (confirm("Press a button!")) {
            txt = "deleted";
        } else {
            // 
        }
        document.getElementById("demo").innerHTML = txt;
    }
</script>