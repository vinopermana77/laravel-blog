<!DOCTYPE html>
<html lang="en-us">

<head>
    @include('home.homecss')
</head>

<body>

    {{-- Header --}}
    @include('home.header')
    {{-- Header --}}



    {{-- Main --}}
    <main>
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-6 col-xl-4 mb-3">
                    <article class="card article-card article-card-sm h-100">
                        <a href="{{ url('post_detail', $post->id) }}">
                            <div class="card-image text-center">
                                <div class="post-info"> <span class="text-uppercase">{{ date('d M Y',
                                        strtotime($post->created_at)) }}</span>
                                </div>
                                <img src="images/{{ $post->image }}" alt="Post Thumbnail"
                                    style="width: 400px; height: 200px;">
                            </div>
                        </a>
                        <div class="card-body px-0 pb-0">
                            <div class="d-flex justify-content-between">
                                <ul class="post-meta mb-2">
                                    <li>
                                        <p>Author : <b>{{ $post->name }}</b></p>
                                    </li>
                                </ul>
                                <ul class="post-meta mb-2">
                                    <li>
                                        <p>Status : <b>{{ $post->post_status }}</b></p>
                                    </li>
                                </ul>
                            </div>
                            <h2>
                                <h2>{{ $post->title }}</h2>
                            </h2>
                            <p class="card-text">{!! Str::limit($post->description) !!}</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <a class="btn btn-info" href="{{ url('edit_post', $post->id) }}">Edit
                                </a>
                                <form action="{{ url('destroy', $post->id) }}" method="post">
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    <button type="submit" class="btn btn-danger confirm_delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    {{-- Main --}}

    {{-- Footer --}}
    @include('home.footer')
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