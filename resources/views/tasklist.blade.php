<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>customer detaials</title>
</head>

<body>


    <div class="container mt-4">

        <h3 class="text-center"> Task details</h3>
        <a href="{{route('todo.create')}}" class="btn btn-info float-end px-2"> Create task </a>
        <form action="{{ route('todo.index') }}" method="GET" class="float-end " style="width: 70px">
            <select name="status" id="statusFilter" class="form-select ">
                <option value="">All</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                </option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
                    Completed</option>
                <option value="progress" {{ request('status') == 'progress' ? 'selected' : '' }}>In
                    Progress</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2 ">Filter</button>
        </form>
        <table class="table table-dark" style="text-align: center ">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>action</th>
                   
                </tr>
            </thead>

            <tbody>
                @php
                    $sr = 1;
                @endphp
                @foreach ($model as $value)
                    <tr>
                        <td>{{ $sr++ }} </td>
                        <td>{{ $value->title }}</td>
                        <td>
                            {{ $value->due_date }}
                        </td>
                        <td
                            class="p-2 
                        @if (strtotime($value->due_date) < strtotime('now') && $value->status !== 'completed') bg-danger text-white 
                        @else 
                            bg-success text-white @endif">
                            {{ $value->status }}</td>
                        <td class="px-5">
                            <form action="{{ route('todo.destroy', $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-end">delete</button>
                            </form>
                            @php
                                $today = strtotime(date('Y-m-d'));
                                $dueDate = strtotime($value->due_date);
                            @endphp
                            @if ($dueDate < $today)
                                <button class="btn btn-success" disabled>Edit</button>
                            @else
                                <a href="{{ route('todo.edit', $value->id) }}" class="btn btn-success">Edit</a>
                            @endif
                            <a href="{{ route('todo.show', $value->id) }}" class=" btn btn-info">view</a>

                        </td>
                    </tr>

            </tbody>
            @endforeach
        </table>
        <div class="d-flex">
            {!! $model->links() !!}
        </div>
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>
