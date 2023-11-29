<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Show Form</h2>
        <a href="{{ route('todo.index') }}">Home</a>
        <div class="card p-5 col-8">
            <form>
                <div class="form-group">
                    <label for="taskTitle">Task Title</label>
                    <input type="text" class="form-control" id="taskTitle" value="{{ $data->title }}" readonly>
                </div>
                <div class="form-group">
                    <label for="taskDescription">Task Description</label>
                    <textarea class="form-control" id="taskDescription" rows="4" readonly>{{ $data->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="dueDate">Due Date</label>
                    <p
                        class="p-2 
                        @if ($data->due_date < now() && $data->status !== 'completed') bg-danger text-white 
                        @else 
                            bg-success text-white @endif">
                        {{ $data->due_date }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" value="{{ $data->status }}" readonly>
                </div>
              

            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
