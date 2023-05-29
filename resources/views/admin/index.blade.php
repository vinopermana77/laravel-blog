<!DOCTYPE html>
<html>

<head>
    @include('admin.admincss')
</head>

<body>
    {{-- Header --}}
    @include('admin.header')
    {{-- Header --}}

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <!-- Basic Form-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tables </li>
                </ul>
                <div class="header mt-5 mb-5 text-center text-white">
                    <h1>Create Post</h1>
                </div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message'); }}
                </div>
                @endif
                <div class="row">
                    <div class="col">
                        <div class="block">
                            <div class="title">
                                <strong>All data posts</strong>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>User Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$post->title }}</td>
                                            <td>{{ Str::limit($post->description, 50)}}</td>
                                            <td>
                                                <img src="images/{{ $post->image }}" style="width: 150px;" alt="Image">
                                            </td>
                                            <td>{{$post->name }}</td>
                                            <td>{{$post->post_status }}</td>
                                            <td>{{$post->usertype }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ url($post->id) }}" class=" btn btn-info">Show</a>
                                                    <a href="posts/{{ $post->id }}/edit"
                                                        class="btn btn-success m-3">Edit</i>
                                                    </a>
                                                    <form action="/posts/{{ $post->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger ms-2 confirm_delete">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{-- {{ asset('storage/postImage/'.$post->image) }} --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('admin.footer')
        {{-- Footer --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.confirm_delete').click(function(event) {
            let form =  $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this post?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
        </script>
</body>

</html>