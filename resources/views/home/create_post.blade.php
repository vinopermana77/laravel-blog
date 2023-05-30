<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blog - Alvino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <link rel="shortcut icon" href="blog/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="blog/images/favicon.png" type="image/x-icon">
    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />
    <!-- # Google Fonts -->
    <link rel="preconnect" href="blog/https://fonts.googleapis.com">
    <link rel="preconnect" href="blog/https://fonts.gstatic.com" crossorigin>
    <link
        href="blog/https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="blog/plugins/bootstrap/bootstrap.min.css">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="blog/css/style.css">


    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row no-gutters-lg">
            <div class="col-12">
                <h2 class="section-title">Create Post</h2>
                <div class="page-content">
                    <!-- Basic Form-->
                    <div class="container-fluid">
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
                                        <textarea class="form-control" id="summernote" name="description"
                                            rows="3"></textarea>
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
        </div>
    </div>
    <!-- summernote css/js -->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
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