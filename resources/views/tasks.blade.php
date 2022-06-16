@extends('app')
 
@section('content')
<div class="panel panel-default col-6">
            <div class="panel-heading text-center bg-light pt-5 pb-5">
                New Task
            </div>
    <div class="panel-body mb-5">
        <!-- Display Validation Errors -->
       
        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
           @csrf
 
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
 
                <div class="col-12">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> + Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
     <!-- Create Task Form... -->
 
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default border col-6">
            <div class="panel-heading text-center bg-light pt-5 pb-5">
                Current Tasks
            </div>
 
            <div class="panel-body">
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th  colspan="2" class="text-center">Task</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text text-center">
                                    <div>{{ $task->name }}</div>
                                </td>
                                
 
                                <td class="text-center">
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary">Delete Task</button>
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