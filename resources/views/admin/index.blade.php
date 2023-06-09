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
                <div class="row">
                    <div class="col">
                        <div class="block">
                            <div class="mb-3 col-12 col-sm-8 col-md-5">
                                <form action="" method="GET">
                                    <input type="search" class="form-control" name="katakunci" id="katakunci"
                                        placeholder="Search...">
                                </form>
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
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$post->title }}</td>
                                            <td>{!! Str::limit($post->description, 50) !!}</td>
                                            <td>
                                                <img src="images/{{ $post->image }}" style="width: 150px;" alt="Image">
                                            </td>
                                            <td>{{$post->name }}</td>
                                            <td>{{$post->post_status }}</td>
                                            <td>{{$post->usertype }}</td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-around mt-3">
                                                    <a href="{{ url('accept_post', $post->id) }}"
                                                        class="btn btn-outline-success">Accept</a>
                                                    <a href="{{ url('reject_post', $post->id) }}"
                                                        class="btn btn-outline-danger ms-2">Reject</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-around mt-3">
                                                    <a href="{{ url('post_detail', $post->id) }}"
                                                        class=" btn btn-info">Show</a>
                                                    <a href="edit/{{ $post->id }}" class="btn btn-success">Edit</i>
                                                    </a>
                                                    <form action="/destroy/{{ $post->id }}" method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger ms-2 confirm_delete">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="paginate mt-3">
                                    {{ $posts->links('pagination::bootstrap-5') }}
                                </div>
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