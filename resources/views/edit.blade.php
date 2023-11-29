
{{-- {{dd("hello")}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Form</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h2>Task Form Edit</h2>
    {{-- {{dd($todo)}} --}}
    <form action="{{route('todo.update',$todo->id)}}" method="POST">
      @method('PUT');
        @csrf
        <input type="hidden" value="{{$todo->id}}" name="id">

      <div class="form-group">
        <label for="taskTitle">Task Title</label>
        <input type="text" class="form-control" id="taskTitle" placeholder="Enter task title"  name="title" value="{{$todo->title}}" required>
      </div>
      <div class="form-group">
        <label for="taskDescription">Task Description</label>
        <textarea class="form-control" id="taskDescription" placeholder="Enter task description" rows="4" name="description" value="" required> {{$todo->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="dueDate">Due Date</label>
        <input type="date" class="form-control" id="dueDate" min="<?php echo date('Y-m-d');  ?>" name="date"  value="{{$todo->due_date}}" required>
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status"  name="status" required>
            <option value="" disabled>Select status</option>
            <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="progress" {{ $todo->status == 'progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed</option>
          </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
