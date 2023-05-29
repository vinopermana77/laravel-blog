<!DOCTYPE html>
<html>

<head>
    <base href="/public">
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
                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Index</a></li>
                    <li class="breadcrumb-item active">Update Post </li>
                </ul>
                <div class="header mt-5 mb-5 text-center text-white">
                    <h1>Update Post</h1>
                </div>
                {{-- Notif Validation --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- Notif Validation --}}
                <div class="block">
                    <div class="block-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $post->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="3">{{ $post->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Preview Image</label>
                                <img src="images/{{ $post->image }}" style="width: 300px;" alt="Image" id="preview">
                            </div>
                            <div class="mb-3">
                                <label for="photo">Uploud Image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    onchange="previewImage(event)">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('admin.footer')
        {{-- Footer --}}

        <script>
            function previewImage(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
    
                    reader.onload = function (e) {
                        document.getElementById('preview').src = e.target.result;
                    };
    
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
</body>

</html>