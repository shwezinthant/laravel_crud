<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            padding: 100px;
        }
    </style>
    <title>Index page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5>Posts List</h5>
                <a href="{{ route('posts.create') }}">
                    {{-- {{ url('/posts/create') }} --}}
                    <button class="btn btn-primary btn-sm mb-2">
                        <i class="fa fa-plus-circle"></i> Add New</button>
                </a>
                @if (Session('successAlert'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ Session('successAlert') }}</strong>
                        {{-- <button class="close btn btn-danger" data-dismiss="alert">&times;</button> --}}
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    <form action="{{ url('posts/' . $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('posts.edit', $post->id) }}">
                                            {{-- {{ url('posts/' . $post->id . '/edit') }} --}}
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i> Edit</button></a>
                                        <button type="submit"
                                            class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>

            <div class="col-md-2"></div>

        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
