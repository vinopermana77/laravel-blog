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
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Tables</a></li>
                    <li class="breadcrumb-item active">Create Post </li>
                </ul>
                <div class="header mt-5 mb-5 text-center text-white">
                    <h1>Create Post</h1>
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
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="summernote" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="preview">
                                    <label for="preview">Preview</label>
                                    <img id="preview" width="200px">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="photo">Uploud Image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    onchange="loadFile(event)">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('admin.footer')
    {{-- Footer --}}
    <!-- summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
        height: 200
        });
    </script>

    {{-- Preview Image --}}
    <script>
        let loadFile = (event) => {
            let preview = document.getElementById('preview')
            preview.src = URL.createObjectURL(event.target.files[0])
        }
    </script>
</body>

</html>