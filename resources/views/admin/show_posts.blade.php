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
                <div class="row">
                    <div class="col">
                        <div class="block">
                            <div class="title">
                                <strong>All data posts</strong>
                            </div>
                            <a href="{{ url('post_page') }}" class="btn btn-danger">Add Post</a>
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
</body>

</html>