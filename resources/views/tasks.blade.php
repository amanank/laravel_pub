@extends('layouts.app')
@section('content')
<div class="container  mx-auto " style="width: 900px;">
    <div class="panel-body">

        @include('common.errors')
        <form action="/task" method="POST" class="form-horizontal needs-validation" novalidate>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="task validation01" class="col-sm-3 form-label">Task</label>

                <div class="col-sm-6  has-validation">
                    <input type="text" class="form-control" name="name" id="task-name  validation01" aria-describedby="inputgroupPrepend" required>
                    <div class="invalid-feedback alert">
                        Please choose a Task.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>

                        <td>
                        <td>
                            <form action="/task/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button onclick="alert()" id="demo" class="btn btn-danger">Delete Task
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
            // txt = " Cancel!";
        }
        document.getElementById("demo").innerHTML = txt;
    }
</script>