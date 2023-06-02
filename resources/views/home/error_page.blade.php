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
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <img loading="lazy" decoding="async" src="blog/images/404.png" alt="404" class="img-fluid mb-4"
                            width="500" height="350">
                        <h1 class="mb-4">Page Not Found!</h1>
                        <a href="{{ url('/') }}" class="btn btn-outline-primary">Back To Home</a>
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