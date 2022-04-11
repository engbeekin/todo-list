<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>todo List!</title>
</head>

<body>



    <div class="container mt-5 py-5">
        @if (session('message'))
            <p class="alert alert-success">{{ session('message') }}</p>
        @elseif (session('delete'))
            <p class="alert alert-danger">{{ session('delete') }}</p>
        @endif
        <div class="card">
            <div class="card-title bg-primary py-2">
                <h1 class="text-light ms-3">Todo List</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('todo.store') }}" method="POST">
                    @csrf
                    @method("POST")

                    <input type="text" class="form-control w-50 py-3" name="name" style="display: inline-block" required>
                    <button type="submit" class="btn btn-primary fs-4">Add Todo</button>
                </form>
                @forelse ($todos as $todo)
                    @if ($todo->status == 0)
                        <div class="row">

                            <div class="col-10">
                                <form action="{{ route('todo.update', $todo->id) }}" method="post">
                                    @csrf
                                    @method("PUT")

                                    <input type="checkbox" style=" height: 30px;width:40px"
                                        onChange="this.form.submit()">
                                    <h1 style=" display: inline-block" id="name">{{ $todo->name }}</h1>
                                    <p style="display: inline-block" class="ms-4">
                                        {{ Carbon\Carbon::parse($todo->created_at)->diffForHumans() }}</p>
                                </form>

                            </div>
                            <div class="col-2">
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn  btn-danger"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endif
                @empty
                    <h3 class="text-center text-dark mt-3">There's no todos now</h3>
                @endforelse
            </div>


        </div>

        <div class="mt-5">

            <h4>To see the Analytics page <a href="/barchart">Click Here</a></h4>
        </div>
    </div>












    <!-- jquery cdn -->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>




</body>

</html>
