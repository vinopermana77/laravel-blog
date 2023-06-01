<!DOCTYPE html>
<html lang="en-us">

<head>
    <base href="/public">
    @include('home.homecss')
</head>

<body>

    {{-- Header --}}
    @include('home.header')
    {{-- Header --}}

    {{-- Main --}}
    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <article>
                            <div class="text-center">
                                <img loading="lazy" decoding="async" style="width: 800px; margin: auto;"
                                    src="images/{{ $post->image }}" alt="Post Thumbnail">
                            </div>
                            <ul class="post-meta mb-2 mt-4">
                                <li>
                                    <span>{{ date('d M Y', strtotime($post->created_at)) }}</span>
                                </li>
                            </ul>
                            <h1 class="my-3">{{ $post->title }}</h1>
                            <ul class="post-meta mb-4">
                                <li> <a href="/categories/destination">Computer</a>
                                </li>
                            </ul>
                            <div class="content text-left">
                                <p>{!! ($post->description) !!}</p>
                                <hr>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- Main --}}

    {{-- Footer --}}
    @include('home.footer')
    {{-- Footer --}}

</body>

</html>