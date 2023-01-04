<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            {{-- new task col --}}
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        New Task
                    </div>
                    <div class="card-body">
                        <form action="{{ route('taskStore') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Task</label>
                                <input type="text" class="form-control" name="name" id="">
                                @error('name')
                                    <div class="error text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Date <small class="text-info">(Between 11:00 to 16:00)</small></label>
                                <input type="datetime-local" class="form-control" name="date" id=""
                                    min="2023-01-01T11:00:00">
                                @error('date')
                                    <div class="error text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-secondary">Add Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- current task col --}}
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Current Tasks
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Task</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->date->format('d M Y A') }}</td>
                                    <td><a href="{{ route('taskDelete', $task->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
